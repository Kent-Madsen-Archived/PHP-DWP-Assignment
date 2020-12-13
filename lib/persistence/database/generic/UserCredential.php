<?php
    /**
     *  Title: UserCredential
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
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
        private $username = null;
        private $password = null;


        // Accessors
        /**
         * @return string|null
         */
        final public function getUsername(): ?string
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
        final public function getPassword(): ?string
        {
            if( is_null( $this->password ) )
            {
                return null;
            }

            return strval( $this->password );
        }


        /**
         * @param string $var
         * @return string|null
         * @throws Exception
         */
        final public function setUsername( $var = "root" ): ?string
        {
            if( is_null( $var ) )
            {
                $this->username = $var;
                return $this->getUsername();
            }

            if( !is_string( $var ) )
            {
                throw new Exception( 'User Credential - setUsername: Only string are allowed' );
            }

            $this->username = strval( $var );

            return $this->getUsername();
        }


        /**
         * @param string $var
         * @return string|null
         * @throws Exception
         */
        final public function setPassword( $var = "" ): ?string
        {
            if( is_null( $var ) )
            {
                $this->password = $var;
                return $this->getPassword();
            }

            if( !is_string( $var ) )
            {
                throw new Exception( 'User Credential - setPassword: Only string are allowed' );
            }

            $this->password = strval( $var );

            return $this->getPassword();
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