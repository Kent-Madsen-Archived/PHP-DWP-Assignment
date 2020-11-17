<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
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
         * @param $email
         * @return mixed|null
         */
        final public function forgot_my_password_by_email( $email )
        {
            $retVal = null;
            
            return $retVal;   
        }


        /**
         * @param $username
         * @return mixed|null
         */
        final public function forgot_my_password_by_username( $username )
        {
            return null;
        }


            // Registration

        /**
         * @param $profile
         * @param $name
         * @param $email
         * @param $birthday
         * @param $phone_number
         * @param $address
         * @return mixed|null
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
         * @param $profile
         * @param $name
         * @param $email
         * @param $birthday
         * @param $phone_number
         * @param $address
         * @return |null
         * @throws Exception
         */
        final public function register_profile_information( $profile, 
                                                            $name, 
                                                            $email, 
                                                            $birthday, 
                                                            $phone_number, 
                                                            $address )
        {
            $retVal = null;

            $connection = new MySQLConnectorWrapper( $this->getInformation() );
            
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

            $email_found = $person_email_factory->read_by_name( $email );

            if( is_null( $email_found->getIdentity() ) )
            {
                $email = $person_email_factory->create( $email );
            }
            else 
            {
                $email = $email_found;
            }
            
            // retrieve or create address
            $person_address_factory = new PersonAddressFactory( $connection );

            if( is_null( $address->getFactory() ) )
            {
                $address->setFactory( $person_address_factory );
            }

            $address_model = $person_address_factory->create( $address );
            
            // 
            $profile_information_factory = new ProfileInformationFactory( $connection );
            $pi = new ProfileInformationModel( $profile_information_factory );

            $pi->setProfileId( $profile->getIdentity() );

            $pi->setPersonNameId( $name->getIdentity() );
            $pi->setPersonAddressId( $address_model->getIdentity() );
            $pi->setPersonEmailId( $email->getIdentity() );

            $pi->setPersonPhone( $phone_number );
            $pi->setBirthday( $birthday );

            //
            $profile_information_factory->create( $pi );

            return $retVal;
        }


        /**
         * @param $profile_model
         * @return mixed
         */
        final public function hash_profile_password( $profile_model )
        {
            $password_not_hash = $profile_model->getPassword();

            $profile_model->setPassword( $this->generate_password( $password_not_hash ) );
            $profile_model->setIsPasswordHashed( TRUE );

            return $profile_model;
        }


        /**
         * @param $profile_variable
         * @return mixed
         * @throws Exception
         */
        final public function register_profile( $profile_variable )
        {
            //
            $connection = new MySQLConnectorWrapper( $this->getInformation() );
            
            $factory = new ProfileFactory( $connection );
            $profile_variable->setFactory( $factory );

            $profile = $this->hash_profile_password( $profile_variable );

            $profile->setProfileType( 1 );

            $profile = $factory->create( $profile );

            return $profile;
        }

            // Login

        /**
         * @param $username
         * @param $password
         * @return mixed|ProfileModel|null
         * @throws Exception
         */
        final public function login( $username, 
                                     $password )
        {     
            //
            $connection = new MySQLConnectorWrapper( $this->getInformation() );
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
         * @param $input
         * @return false|string|null
         */
        final protected function generate_password( $input )
        {
            return password_hash( $input, PASSWORD_BCRYPT, $this->options );
        }


        /**
         * @param $input_password
         * @param $hash
         * @return bool
         */
        final protected function verify( $input_password, $hash )
        {
            return password_verify( $input_password, $hash );
        }


    }

?>