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
            $this->username = $var;
        }

        /**
         * 
         */
        final public function setPassword( $var )
        {
            $this->password = $var;
        }
    }
?>