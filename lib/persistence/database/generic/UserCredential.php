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
         * @return string|null
         */
        final public function getUsername()
        {
            if( is_null( $this->username ) )
            {
                return  null;
            }

            return strval( $this->username );
        }


        /**
         * @return string|null
         */
        final public function getPassword()
        {
            if( is_null( $this->password ) )
            {
                return null;
            }

            return strval( $this->password );
        }


        /**
         * @param $var
         * @return null
         * @throws Exception
         */
        final public function setUsername( $var )
        {

            if( is_null( $var ) )
            {
                $this->username = $var;
                return $this->username;
            }

            if( !is_string( $var ) )
            {
                throw new Exception( 'User Credential - setUsername: Only string are allowed' );
            }

            $this->username = strval( $var );
        }


        /**
         * @param $var
         * @return null
         * @throws Exception
         */
        final public function setPassword( $var )
        {
            if( is_null( $var ) )
            {
                $this->password = $var;
                return $this->password;
            }

            if( !is_string( $var ) )
            {
                throw new Exception( 'User Credential - setPassword: Only string are allowed' );
            }

            $this->password = strval( $var );
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
            return new UserCredential( self::getDefaultUsername(), '' );
        }
    }
?>