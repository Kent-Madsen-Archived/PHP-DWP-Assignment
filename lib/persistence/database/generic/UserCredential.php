<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    class UserCredential
    {
        // Constructors
        /**
         * 
         */
        public function __construct( $username, $password )
        {
            $this->setUsername( $username );
            $this->setPassword( $password );
        }

        // Variables
        private $username;
        private $password;

        // Accessors
        /**
         * 
         */
        final public function getUsername()
        {
            return $this->username;
        }

        /**
         * 
         */
        final public function getPassword()
        {
            return $this->password;
        }

        /**
         * 
         */
        final public function setUsername( $var )
        {
            if( !is_string( $var ) )
            {
                throw new Exception( 'User Credential - setUsername: Only string are allowed' );
            }

            $this->username = $var;
        }

        /**
         * 
         */
        final public function setPassword( $var )
        {
            if( !is_string( $var ) )
            {
                throw new Exception( 'User Credential - setPassword: Only string are allowed' );
            }

            $this->password = $var;
        }

        /**
         * 
         */
        public static function getDefaultUsername()
        {
            return "root";
        }
    }
?>