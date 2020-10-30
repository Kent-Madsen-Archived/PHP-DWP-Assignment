<?php 

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
        public function getUsername()
        {
            return $this->username;
        }

        /**
         * 
         */
        public function getPassword()
        {
            return $this->password;
        }

        /**
         * 
         */
        public function setUsername( $var )
        {
            $this->username = $var;
        }

        /**
         * 
         */
        public function setPassword( $var )
        {
            $this->password = $var;
        }
    }
?>