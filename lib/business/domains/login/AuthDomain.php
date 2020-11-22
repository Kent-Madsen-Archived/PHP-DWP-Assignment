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
        /**
         * AuthDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
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
         * @return ProfileModel|null
         * @throws Exception
         */
        final public function register(): ?ProfileModel
        {
            $retVal = null;

            if( RegisterDomainFormView::validateIsSubmitted() )
            {

                $username = RegisterDomainFormView::getPostUsername();
                $password = RegisterDomainFormView::getPostPassword();

                //
                $email      = RegisterDomainFormView::getPostPersonMail();
                $phone      = RegisterDomainFormView::getPostPhone();
                $birthday   = RegisterDomainFormView::getPostBirthday();

                // Name
                $firstname  = RegisterDomainFormView::getPostFirstname();
                $lastname   = RegisterDomainFormView::getPostLastname();
                $middle     = RegisterDomainFormView::getPostMiddlename();

                $streetname     = RegisterDomainFormView::getPostStreetname();
                $street_number  = RegisterDomainFormView::getPostStreetAddressNumber();
                $streetZipcode  = RegisterDomainFormView::getPostZipCode();
                $country        = RegisterDomainFormView::getPostCountry();
            }

            return $retVal;
        }

        // Login
        /**
         * @return ProfileModel|null
         */
        final public function login(): ?ProfileModel
        {


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