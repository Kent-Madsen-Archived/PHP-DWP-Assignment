<?php 

    /**
     * 
     */
    class ProfileModel 
        extends DatabaseModel 
            implements ProfileView, 
                       ProfileController 
                        
    {
        // Constructor
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        // Variables
        private $identity = 0;

        private $username = null;
        private $password = null;

        // Accessors
        // Getters
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
        public function getIdentity()
        {
            return $this->identity;
        }

        // Setters
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

        /**
         * 
         */
        public function setIdentity( $var )
        {
            $this->identity = $var;
        }
        

    }


?>