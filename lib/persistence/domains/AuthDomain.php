<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * 
     */
    class AuthDomain
        extends Domain
            implements AuthInteraction
    {
        /**
         * 
         */
        public function __construct()
        {
            $access = new NetworkAccess( WEBPAGE_DATABASE_HOSTNAME, WEBPAGE_DATABASE_PORT );   
            $user_credential = new UserCredential( WEBPAGE_DATABASE_USERNAME, WEBPAGE_DATABASE_PASSWORD );

            $database = WEBPAGE_DATABASE_NAME;

            $this->setInformation( new MySQLInformation( $access, $user_credential, $database ) );
        }


        // Variables
        private $options = [ 'cost'=>15 , 
                             'salt'=>WEBPAGE_DEFAULT_SALT ];

        // Body of domain

            // Forgot my password
        /**
         * 
         */
        final public function forgot_my_password_by_email( $email )
        {
            $retVal = null;
            
            return $retVal;   
        }


        /**
         * 
         */
        final public function forgot_my_password_by_username( $username )
        {
            return null;
        }


            // Registration
        /**
         * 
         */
        final public function register( $profile, 
                                        $name, 
                                        $email, 
                                        $birthday, 
                                        $phone_number, 
                                        $address )
        {
            $retVal = null;

            $profile = $this->register_profile( $profile );

            $pi = $this->register_profile_information(  $profile, 
                                                        $name, 
                                                        $email, 
                                                        $birthday, 
                                                        $phone_number, 
                                                        $address );

            return $retVal;   
        }


        /**
         * 
         */
        final public function register_profile_information( $profile, 
                                                            $name, 
                                                            $email, 
                                                            $birthday, 
                                                            $phone_number, 
                                                            $address )
        {
            $retVal = null;

            $connection = new MySQLConnector( $this->getInformation() );
            
            // retrieve or create name
            $person_name_factory = new PersonNameFactory( $connection );
            
            // if empty, insert factory
            if( is_null( $name->getFactory() ) )
            {
                $name->setFactory( $person_name_factory );
            }

            $name = $person_name_factory->create( $name );


            // retrieve or create email
            $person_email_factory = new PersonEmailFactory( $connection );

            if( is_null( $email->getFactory() ) )
            {
                $email->setFactory( $person_email_factory );
            }

            $email_found = $person_email_factory->get_by_name( $email->getContent() );

            if( is_null( $email_found ) )
            {
                $email = $person_email_factory->create( $email );
            }
            else 
            {
                $email = $email_found[0];
            }
            
            // retrieve or create address
            $person_address_factory = new PersonAddressFactory( $connection );

            if( is_null( $address->getFactory() ) )
            {
                $address->setFactory( $person_address_factory );
            }

            $address = $person_address_factory->create( $address );
            
            // 
            $profile_information_factory = new ProfileInformationFactory( $connection );
            $pi = new ProfileInformationModel( $profile_information_factory );

            $pi->setProfileId( $profile->getIdentity() );
            
            $pi->setPersonNameId( $name->getIdentity() );
            $pi->setPersonAddressId( $address->getIdentity() );
            $pi->setPersonEmailId( $email->getIdentity() );

            $pi->setPersonPhone( $phone_number );
            $pi->setBirthday( $birthday );

            //
            $profile_information_factory->create( $pi );

            return $retVal;
        }


        /**
         * 
         */
        final public function hash_profile_password( $profile_model )
        {
            $password_not_hash = $profile_model->getPassword();

            $profile_model->setPassword( $this->generate_password( $password_not_hash ) );
            $profile_model->setIsPasswordHashed( TRUE );

            return $profile_model;
        }


        /**
         * 
         */
        final public function register_profile( $profile_variable )
        {
            //
            $connection = new MySQLConnector( $this->getInformation() );
            
            $factory = new ProfileFactory( $connection );
            $profile_variable->setFactory( $factory );

            $profile = $this->hash_profile_password( $profile_variable );

            $profile->setProfileType( 1 );

            $profile = $factory->create( $profile );

            return $profile;
        }

            // Login
        /**
         * 
         */
        final public function login( $username, 
                                     $password )
        {     
            //
            $connection = new MySQLConnector( $this->getInformation() );
            $factory = new ProfileFactory( $connection );

            // Retrieves a user by their username
            $arr = $factory->get_by_username( $username );

            if( is_null( $arr ) )
            {
                return null;
            }

            if( $this->verify( $password, $arr->getPassword() ) )
            {
                return $arr;
            }

            return null;
        }


        // Internal
        /**
         * 
         */
        final protected function generate_password( $input )
        {
            return password_hash( $input, PASSWORD_BCRYPT, $this->options );
        }


        /**
         * 
         */
        final protected function verify( $input_password, $hash )
        {
            return password_verify( $input_password, $hash );
        }


    }

?>