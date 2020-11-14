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
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }


        // Variables
        private $identity = 0;

        private $username = null;
        private $password = null;

        private $is_password_hashed = false;

        private $profile_type = 0;


        // implementation of factory classes
        /**
         * 
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ProfileFactory )
            {
                return true;
            }

            return false;
        }

        
        // Accessors
            // Getters
        /**
         * 
         */
        final public function getIdentity()
        {
            return $this->identity;
        }
        

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
        final public function getProfileType()
        {
            return $this->profile_type;
        }


        /**
         * 
         */
        final public function getIsPasswordHashed()
        {
            return $this->is_password_hashed;
        }


            // Setters
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
        final public function setIsPasswordHashed( $var )
        {
            $this->is_password_hashed = $var;
        }


        /**
         * 
         */
        final public function setPassword( $var )
        {   
            $this->password = $var;
        }


        /**
         * 
         */
        final public function setProfileType( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->profile_type = $var;
        }


        /**
         * 
         */
        final public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ProfileModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $var;
        }
        

    }

?>