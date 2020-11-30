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
            $this->setName(self::class_name);
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
        }


        // Variables
        private $options = [    'cost'=>15,
                                'salt'=>WEBPAGE_DEFAULT_SALT    ];

        // Body of domain
        // Forgot my password
        /**
         * @return bool
         */
        final public function forgotMyPasswordUseEmail(): bool
        {
            $retVal = false;

            return $retVal;
        }


        /**
         * @return bool
         */
        final public function forgotMyPasswordUseUsername(): bool
        {
            $retVal = false;

            return boolval( $retVal );
        }


        // Registration
        /**
         * @return ProfileModelEntity|null
         * @throws Exception
         */
        final public function register(): ?ProfileModelEntity
        {
            $retVal = null;

            if( RegisterForm::validateIsSubmitted() )
            {
                $value_username = RegisterForm::getPostUsername();
                $value_password = RegisterForm::getPostPassword();


                $profile_factory = new ProfileFactory( new MySQLConnectorWrapper( $this->getInformation() ) );

                if( !is_null( $profile_factory->readByUsername( $value_username ) ) )
                {
                    throw new Exception('User already exist');
                }

                $pmd = $profile_factory->createModel();

                $pmd->setUsername( $value_username );
                $pmd->setPassword( $this->generate_password( $value_password ) );

                $pmd->setProfileType( 2 );

                $profile_factory->create( $pmd );


                //
                $email      = RegisterForm::getPostPersonMail();

                $email_factory = new PersonEmailFactory( new MySQLConnectorWrapper( $this->getInformation() ) );
                $emailModel = $email_factory->createModel();
                $emailModel->setContent( $email );

                if( $email_factory->validateIfMailExist( $emailModel ) )
                {
                    $email_factory->readModelByName( $emailModel );
                }
                else 
                {
                    $email_factory->create( $emailModel );
                }

                $name_factory = new PersonNameFactory( new MySQLConnectorWrapper( $this->getInformation() ) );
                $name_model = $name_factory->createModel();

                // Name
                $firstname  = RegisterForm::getPostFirstname();
                $name_model->setFirstName( $firstname );

                $lastname   = RegisterForm::getPostLastname();
                $name_model->setLastName( $lastname );

                $middle     = RegisterForm::getPostMiddlename();
                $name_model->setMiddleName( $middle );

                $name_factory->create( $name_model );

                // 
                $streetname     = RegisterForm::getPostStreetname();
                $street_number  = RegisterForm::getPostStreetAddressNumber();
                $streetZipcode  = RegisterForm::getPostZipCode();
                $streetFloor    = RegisterForm::getPostStreetAddressFloor();
                $country        = RegisterForm::getPostCountry();

                $addr_factory = new PersonAddressFactory( new MySQLConnectorWrapper( $this->getInformation() ) );
                $addr_model = $addr_factory->createModel();
                $addr_model->setStreetName($streetname);
                $addr_model->setStreetAddressNumber($street_number);
                $addr_model->setCountry($country);
                $addr_model->setStreetFloor($streetFloor);
                $addr_model->setZipCode($streetZipcode);

                $addr_factory->create( $addr_model );

                //
                $phone      = RegisterForm::getPostPhone();
                $birthday   = RegisterForm::getPostBirthday();

                $pi_factory = new ProfileInformationFactory( new MySQLConnectorWrapper( $this->getInformation() ) );
                $pim = $pi_factory->createModel();
                $pim->setBirthday($birthday);
                $pim->setPersonPhone($phone);
                $pim->setPersonAddressId($addr_model->getIdentity());
                $pim->setPersonNameId($name_model->getIdentity());
                $pim->setPersonEmailId($emailModel->getIdentity());
                $pim->setProfileId($pmd->getIdentity());

                $pi_factory->create($pim);

                $retVal = $pmd;
            }

            return $retVal;
        }

        // Login
        /**
         * @return ProfileModelEntity|null
         * @throws Exception
         */
        final public function login(): ?ProfileModelEntity
        {
            if( LoginForm::validateIsSubmitted() )
            {
                $username = LoginForm::getPostUsername();
                $password = LoginForm::getPostPassword();

                $profile_factory = new ProfileFactory( new MySQLConnectorWrapper( $this->getInformation() ) );

                $profile = $profile_factory->readByUsername( $username );

                if( password_verify( $password, $profile->getPassword() ) )
                {
                    return $profile;
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
        final protected function generate_password( $input ): ?string
        {
            return password_hash( $input, PASSWORD_BCRYPT, $this->options );
        }


        /**
         * @return AuthDomainView
         * @throws Exception
         */
        final public function getView(): AuthDomainView
        {
            return new AuthDomainView( $this );
        }


        /**
         * @return AuthDomainController
         * @throws Exception
         */
        final public function getController(): AuthDomainController
        {
            return new AuthDomainController( $this );
        }

    }

?>