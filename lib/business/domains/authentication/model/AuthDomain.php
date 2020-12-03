<?php
    /**
     *  Title: AuthDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class AuthDomain
     */
    class AuthDomain
        extends Domain
        implements AuthInteraction
    {
        public const class_name = "AuthDomain";

        /**
         * AuthDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setName(self::class_name );
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }


        // Variables
        private $options = [ 'cost'=>15,
                             'salt'=>WEBPAGE_DEFAULT_SALT ];

        // Forgot my password
        /**
         * @return bool
         */
        public final function forgotMyPasswordUseEmail(): bool
        {
            $retVal = false;

            return $retVal;
        }


        /**
         * @return bool
         */
        public final function forgotMyPasswordUseUsername(): bool
        {
            $retVal = false;

            return boolval( $retVal );
        }


        // Registration
        /**
         * @param string $email_value
         * @return PersonEmailModel|null
         * @throws Exception
         */
        private final function retrieveOrCreateEmail( string $email_value ): ?PersonEmailModel
        {
            $email_factory = $this->getPersonEmailFactory();

            $emailModel = $email_factory->createModel();
            $emailModel->setContent( $email_value );

            if( $email_factory->validateIfMailExist( $emailModel ) )
            {
                $email_factory->readModelByName( $emailModel );
            }
            else
            {
                $email_factory->create( $emailModel );
                $email_factory->readModel($emailModel );
            }

            return $emailModel;
        }


        /**
         * @param string $username_var
         * @return bool
         * @throws Exception
         */
        private final function validateExistenceOfProfile( string $username_var ): bool
        {
            $profile_factory = $this->getProfileFactory();
            $retval = false;

            if( !is_null( $profile_factory->readByUsername( $username_var ) ) )
            {
                $retval = true;
            }

            return $retval;
        }


        /**
         * @param string $username_var
         * @param string $password_var
         * @param int $profile_type_id_var
         * @return ProfileModel|null
         * @throws Exception
         */
        private final function createProfile( string $username_var,
                                              string $password_var,
                                              int $profile_type_id_var ): ?ProfileModel
        {
            $profile_factory = $this->getProfileFactory();

            if( $this->validateExistenceOfProfile( $username_var ) )
            {
                throw new Exception('Profile already exist');
            }

            $pmd = $profile_factory->createModel();

            $pmd->setUsername( $username_var );
            $pmd->setPassword( $this->generatePassword( $password_var ) );

            $pmd->setProfileType( $profile_type_id_var );

            $profile_factory->create( $pmd );

            return $pmd;
        }


        /**
         * @param string|null $firstname_var
         * @param string|null $lastname_var
         * @param string|null $middle_name_var
         * @return PersonNameModel|null
         * @throws Exception
         */
        private final function createPersonNameModel( string $firstname_var,
                                                      ?string $lastname_var,
                                                      string $middle_name_var ): ?PersonNameModel
        {
            $factory = $this->getPersonNameFactory();
            $nm = $factory->createModel();

            $nm->setFirstName( $firstname_var );
            $nm->setLastName( $lastname_var );
            $nm->setMiddleName( $middle_name_var );

            $factory->create( $nm );

            return $nm;
        }


        /**
         * @param string|null $streetAddressName_var
         * @param int $streetNumber_var
         * @param string|null $country_var
         * @param string|null $street_floor_var
         * @param string|null $zip_code_var
         * @return PersonAddressModel|null
         * @throws Exception
         */
        private final function createPersonAddressModel( string $streetAddressName_var,
                                                         int $streetNumber_var = 0,
                                                         string $country_var,
                                                         string $street_floor_var,
                                                         string $zip_code_var ): ?PersonAddressModel
        {
            $factory = $this->getPersonAddressFactory();
            $am = $factory->createModel();

            $am->setStreetAddressName( $streetAddressName_var );
            $am->setStreetAddressNumber( $streetNumber_var );
            $am->setStreetAddressFloor( $street_floor_var );

            $am->setCountry( $country_var );
            $am->setZipCode( $zip_code_var );

            $factory->create( $am );

            return $am;
        }


        /**
         * @param string|null $birthday_var
         * @param string|null $personPhoneNumber_var
         * @param int $person_addr_id_var
         * @param int $person_name_id_var
         * @param int $person_email_id_var
         * @param int $profile_id_var
         * @return ProfileInformationModel|null
         * @throws Exception
         */
        private final function createProfileInformationModel( ?string $birthday_var,
                                                              ?string $personPhoneNumber_var,
                                                              int $person_addr_id_var,
                                                              int $person_name_id_var,
                                                              int $person_email_id_var,
                                                              int $profile_id_var ): ?ProfileInformationModel
        {
            $pi_factory = $this->getProfileInformationFactory();
            $pim = $pi_factory->createModel();

            $pim->setBirthday( $birthday_var );
            $pim->setPersonPhone( $personPhoneNumber_var );

            $pim->setPersonAddressId( $person_addr_id_var );

            $pim->setPersonNameId( $person_name_id_var );
            $pim->setPersonEmailId( $person_email_id_var );
            $pim->setProfileId( $profile_id_var );

            $pi_factory->create($pim );

            return $pim;
        }


        /**
         * @param string|null $content
         * @return ProfileTypeModel|null
         * @throws Exception
         */
        private final function retrieveProfileTypeByName( string $content ): ?ProfileTypeModel
        {
            $factory = $this->getProfileTypeFactory();

            $model = $factory->createModel();
            $model->setContent( $content );
            $factory->readModel($model );

            return $model;
        }


        /**
         * @return ProfileModel|null
         * @throws Exception
         */
        public final function register(): ?ProfileModel
        {
            $retVal = null;

            if( RegisterForm::validateIsSubmitted() )
            {
                $value_username = RegisterForm::getPostUsername();
                $value_password = RegisterForm::getPostPassword();

                $ptm = $this->retrieveProfileTypeByName('kunde');
                $pmd = $this->createProfile( $value_username,
                                             $value_password,
                                             $ptm->getIdentity() );

                //
                $email      = RegisterForm::getPostPersonMail();
                $pem        = $this->retrieveOrCreateEmail( $email );

                $middlename     = RegisterForm::getPostMiddlename();
                $lastname       = RegisterForm::getPostLastname();
                $firstname      = RegisterForm::getPostFirstname();

                $pnm = $this->createPersonNameModel( $firstname,
                                                     $lastname,
                                                     $middlename );

                // 
                $street_address_name    = RegisterForm::getPostStreetname();
                $street_address_number  = RegisterForm::getPostStreetAddressNumber();
                $street_address_floor   = RegisterForm::getPostStreetAddressFloor();

                $zip_code               = RegisterForm::getPostZipCode();
                $country                = RegisterForm::getPostCountry();

                $pam = $this->createPersonAddressModel( $street_address_name,
                                                        $street_address_number,
                                                        $country,
                                                        $street_address_floor,
                                                        $zip_code );

                //
                $phone      = RegisterForm::getPostPhone();
                $birthday   = RegisterForm::getPostBirthday();

                $pim = $this->createProfileInformationModel( $birthday,
                                                             $phone,
                                                             $pam->getIdentity(),
                                                             $pnm->getIdentity(),
                                                             $pem->getIdentity(),
                                                             $pmd->getIdentity() );

                $retVal = $pmd;
            }

            return $retVal;
        }


        // Login
        /**
         * @return ProfileModel|null
         * @throws Exception
         */
        public final function login(): ?ProfileModel
        {
            if( LoginForm::validateIsSubmitted() )
            {
                $input_username = LoginForm::getPostUsername();
                $input_password = LoginForm::getPostPassword();

                $profile_factory = $this->getProfileFactory();
                $pm = $profile_factory->readByUsername( $input_username );

                if( password_verify( $input_password,
                                     $pm->getPassword() ) )
                {
                    return $pm;
                }

            }

            return null;
        }


        /**
         * @return bool
         */
        final public function forgotMyPassword(): bool
        {

            return false;
        }

        // Internal
        /**
         * @param $input
         * @return string|null
         */
        protected final function generatePassword( $input ): ?string
        {
            return password_hash( $input, PASSWORD_BCRYPT, $this->options );
        }


        // Accessors
            // Getters
        /**
         * @return array|null
         */
        public final function getOptions(): ?array
        {
            return $this->options;
        }


        /**
         * @return ProfileTypeFactory|null
         * @throws Exception
         */
        protected final function getProfileTypeFactory(): ?ProfileTypeFactory
        {
            return GroupAuthentication::getProfileTypeFactory();
        }


        /**
         * @return PersonEmailFactory|null
         * @throws Exception
         */
        protected final function getPersonEmailFactory(): ?PersonEmailFactory
        {
            return GroupAuthentication::getPersonEmailFactory();
        }


        /**
         * @return PersonAddressFactory|null
         * @throws Exception
         */
        protected final function getPersonAddressFactory(): ?PersonAddressFactory
        {
            return GroupAuthentication::getPersonAddressFactory();
        }


        /**
         * @return PersonNameFactory|null
         * @throws Exception
         */
        protected final function getPersonNameFactory(): ?PersonNameFactory
        {
            return GroupAuthentication::getPersonNameFactory();
        }


        /**
         * @return ProfileFactory|null
         * @throws Exception
         */
        protected final function getProfileFactory(): ?ProfileFactory
        {
            return GroupAuthentication::getProfileFactory();
        }


        /**
         * @return ProfileInformationFactory|null
         * @throws Exception
         */
        protected final function getProfileInformationFactory(): ?ProfileInformationFactory
        {
            return GroupAuthentication::getProfileInformationFactory();
        }


        /**
         * @param array|null $options
         */
        public final function setOptions( ?array $options ): void
        {
            $this->options = $options;
        }


    }

?>