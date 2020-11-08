<?php 

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
            
        }

        // Variables
        private $options = [ 'cost'=>15 , 
                             'salt'=>WEBPAGE_DEFAULT_SALT ];

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
            $access = new NetworkAccess( 'localhost', 3600 );
            $user_credential = new UserCredential( 'development', 'Epc63gez' );

            $database = "dwp_assignment";

            //
            $mysql_information = new MySQLInformation( $access, $user_credential, $database );

            //
            $connection = new MySQLConnector( $mysql_information );
            $factory = new ProfileFactory( $connection );

            $arr = $factory->get_by_username( 'madsen' );

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

        /**
         * 
         */
        public function register( $username, $password, $name, $email, $birthday, $phone_number, $address )
        {
            $retVal = null;

            return $retVal;   
        }

        public function register_profile( $username, $password )
        {
            $access = new NetworkAccess( 'localhost', 3600 );
            $user_credential = new UserCredential( 'development', 'Epc63gez' );
        
            $database = "dwp_assignment";
        
            //
            $mysql_information = new MySQLInformation( $access, $user_credential, $database );
        
            //
            $connection = new MySQLConnector( $mysql_information );
            
            $factory = new ProfileFactory( $connection );
            $profile = new ProfileModel( $factory );

            $profile->setUsername( $username );
            $profile->setPassword( $this->generate_password( $password ) );

            $profile->setProfileType( 1 );

            $factory->create( $profile );
        }

        

    }

?>