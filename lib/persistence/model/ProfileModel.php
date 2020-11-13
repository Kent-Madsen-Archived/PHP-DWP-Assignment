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

        private $is_password_hashed = false;

        private $profile_type = 0;

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
        public function getProfileType()
        {
            return $this->profile_type;
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
        public function getIsPasswordHashed()
        {
            return $this->is_password_hashed;
        }

        /**
         * 
         */
        public function setIsPasswordHashed( $var )
        {
            $this->is_password_hashed = $var;
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
        public function setProfileType( $var )
        {
            $this->profile_type = $var;
        }

        /**
         * 
         */
        public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ProfileModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $var;
        }
        

    }

?>