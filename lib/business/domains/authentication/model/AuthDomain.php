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
         * @return ProfileModel|null
         * @throws Exception
         */
        public final function register(): ?ProfileModel
        {
            $retVal = null;

            if( RegisterForm::validateIsSubmitted() )
            {
                $profile_model = $this->registerProfileArea();
                $profile_id = $profile_model->getIdentity();

                //
                $person_email_id = $this->registerProfileEmailArea();
                $person_name_id = $this->registerPersonNameArea();
                $person_addr_id = $this->registerPersonAddressArea();

                //
                $phone      = RegisterForm::getPostPhone();
                $birthday   = RegisterForm::getPostBirthday();

                ProfileDomain::createProfileInformationModel(
                    $birthday, $phone,
                    $person_addr_id, $person_name_id,
                    $person_email_id, $profile_id
                );

                $retVal = $profile_model;
            }

            return $retVal;
        }


        /**
         * @return ProfileModel
         * @throws Exception
         */
        protected final function registerProfileArea(): ProfileModel
        {
            $retVal = 0;

            $value_username = RegisterForm::getPostUsername();
            $value_password = RegisterForm::getPostPassword();

            $ptm = ProfileDomain::retrieveProfileTypeByName('kunde' );

            $pmd = ProfileDomain::createProfile( $value_username,
                                                 $value_password,
                                                 $ptm->getIdentity() );

            $retVal = $pmd;

            return $retVal;
        }


        /**
         * @return int
         * @throws Exception
         */
        protected final function registerProfileEmailArea(): int
        {
            $retVal = 0;

            $email      = RegisterForm::getPostPersonMail();
            $pem        = ProfileDomain::retrieveMailOrCreateModel( $email );

            $retVal = $pem->getIdentity();

            return $retVal;
        }


        /**
         * @return int
         * @throws Exception
         */
        protected final function registerPersonNameArea(): int
        {
            $middlename     = RegisterForm::getPostMiddlename();
            $lastname       = RegisterForm::getPostLastname();
            $firstname      = RegisterForm::getPostFirstname();

            $pnm = ProfileDomain::createPersonNameModel( $firstname, $lastname, $middlename );
            $retVal = $pnm->getIdentity();

            return $retVal;
        }


        /**
         * @return int
         * @throws Exception
         */
        protected final function registerPersonAddressArea(): int
        {
            $street_address_name    = RegisterForm::getPostStreetname();
            $street_address_number  = RegisterForm::getPostStreetAddressNumber();
            $street_address_floor   = RegisterForm::getPostStreetAddressFloor();

            $zip_code               = RegisterForm::getPostZipCode();
            $country                = RegisterForm::getPostCountry();
            $city = RegisterForm::getPostCity();

            $pam = ProfileDomain::createPersonAddressModel( $street_address_name,
                                                            $street_address_number,
                                                            $country,
                                                            $street_address_floor,
                                                            $zip_code,
                                                            $city );
            $retval = $pam->getIdentity();
            return $retval;
        }


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

                $pm = ProfileDomain::retrieveProfileByName( $input_username );

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
        public final function forgotMyPassword(): bool
        {

            return false;
        }

    }

?>