<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class UserCredential
     */
    class UserCredential
    {
        // Constructors
        /**
         * UserCredential constructor.
         * @param $username
         * @param $password
         * @throws Exception
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
         * @return mixed
         */
        final public function getUsername()
        {
            return $this->username;
        }

        /**
         * @return mixed
         */
        final public function getPassword()
        {
            return $this->password;
        }

        /**
         * @param $var
         * @throws Exception
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
         * @param $var
         * @throws Exception
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
         * @return string
         */
        final public static function getDefaultUsername()
        {
            return "root";
        }

        /**
         * @return UserCredential
         * @throws Exception
         */
        final public static function generateDefaultUserCredential()
        {
            return new UserCredential(self::getDefaultUsername(), '');
        }
    }
?>