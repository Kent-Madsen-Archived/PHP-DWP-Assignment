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
            $retVal = null;

            return $retVal;
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

        

    }

?>