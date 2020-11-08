<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
    /**
     * 
     */
    class Auth 
        implements AuthInteraction
    {
        /**
         * 
         */
        function __construct()
        {
            $access = new NetworkAccess( 'localhost', 3600 );   
            $user_credential = new UserCredential( 'development', 'Epc63gez' );
            $database = "dwp_assignment";

            $this->setMysqlInformation( new MySQLInformation( $access, $user_credential, $database ) );
        }

        // Variables
        private $options = [ 'cost'=>15 , 
                             'salt'=>WEBPAGE_DEFAULT_SALT ];

        
        private $mysql_info = null;

        /**
         * 
         */
        protected function generate_password( $input )
        {
            return password_hash( $input, PASSWORD_BCRYPT, $this->options );
        }

        /**
         * 
         */
        protected function verify( $input_password, $hash )
        {
            return password_verify( $input_password, $hash );
        }

        /**
         * 
         */
        public function login( $username, $password )
        {     
            //
            $connection = new MySQLConnector( $this->getMysqlInformation() );
            $factory = new ProfileFactory( $connection );

            // Retrieves a user by their username
            $arr = $factory->get_by_username( $username );

            if( $arr == null )
            {
                return null;
            }

            if( $this->verify( $password, $arr->getPassword() ) )
            {
                return $arr;
            }

            return null;
        }

        /**
         * 
         */
        public function forgot_my_password_by_email( $email )
        {
            $retVal = null;
            
            return $retVal;   
        }

        public function forgot_my_password_by_username( $username )
        {
            return null;
        }

        /**
         * 
         */
        public function register( $profile, $name, $email, $birthday, $phone_number, $address )
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
        public function register_profile_information( $profile, $name, $email, $birthday, $phone_number, $address )
        {
            $retVal = null;

            $connection = new MySQLConnector( $this->getMysqlInformation() );
            
            // retrieve or create name
            $person_name_factory = new PersonNameFactory( $connection );
            
            // if empty, insert factory
            if( $name->getFactory() == null )
            {
                $name->setFactory( $person_name_factory );
            }

            $name = $person_name_factory->create( $name );


            // retrieve or create email
            $person_email_factory = new PersonEmailFactory( $connection );

            if( $email->getFactory() == null )
            {
                $email->setFactory( $person_email_factory );
            }

            $email_found = $person_email_factory->get_by_name( $email->getContent() );

            if( $email_found == null )
            {
                $email = $person_email_factory->create( $email );
            }
            else 
            {
                $email = $email_found[0];
            }
            
            // retrieve or create address
            $person_address_factory = new PersonAddressFactory( $connection );

            if( $address->getFactory() == null )
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
        public function hash_profile_password( $profile_model )
        {
            $password_not_hash = $profile_model->getPassword();

            $profile_model->setPassword( $this->generate_password( $password_not_hash ) );
            $profile_model->setIsPasswordHashed( TRUE );

            return $profile_model;
        }

        /**
         * 
         */
        public function register_profile( $profile_variable )
        {
            //
            $connection = new MySQLConnector( $this->getMysqlInformation() );
            
            $factory = new ProfileFactory( $connection );
            $profile_variable->setFactory( $factory );

            $profile = $this->hash_profile_password( $profile_variable );

            $profile->setProfileType( 1 );

            $profile = $factory->create( $profile );

            return $profile;
        }


        // accessors
        /**
         * 
         */
        public function getMysqlInformation()
        {
            return $this->mysql_info;
        }

        /**
         * 
         */
        public function setMysqlInformation( $var )
        {
            $this->mysql_info = $var;
        }


        

    }

?>