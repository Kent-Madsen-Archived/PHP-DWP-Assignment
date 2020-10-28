<?php 

    class UserCredential
    {
        public function __construct( $username, $password )
        {
            $this->setUsername( $username );
            $this->setPassword( $password );
        }

        private $username;
        private $password;

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