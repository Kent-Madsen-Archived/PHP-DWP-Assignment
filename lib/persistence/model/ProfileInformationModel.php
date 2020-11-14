<?php 

    /**
     * 
     */
    class ProfileInformationModel 
        extends DatabaseModel 
            implements ProfileInformationView, 
                       ProfileInformationController
    {
        // constructors
        /**
         * 
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }


        // variables
        private $identity = 0;

        private $profile_id         = 0;
        private $person_name_id     = 0;
        private $person_address_id  = 0;
        private $person_email_id    = 0;

        private $person_phone   = null;
        private $birthday       = null;

        private $registered = null;
        

        // implementation of factory classes
        /**
         * 
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ProfileInformationFactory )
            {
                return true;
            }

            return false;
        }

        // accessors
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
        final public function getPersonPhone()
        {
            return $this->person_phone;
        }


        /**
         * 
         */
        final public function getBirthday()
        {
            return $this->birthday;
        }


        /**
         * 
         */
        final public function getRegistered()
        {
            return $this->registered;
        }

        
        /**
         * 
         */
        final public function getProfileId()
        {
            return $this->profile_id;
        }


        /**
         * 
         */
        final public function getPersonNameId()
        {
            return $this->person_name_id;
        }


        /**
         * 
         */
        final public function getPersonAddressId()
        {
            return $this->person_address_id;
        }


        /**
         * 
         */
        final public function getPersonEmailId()
        {
            return $this->person_email_id;
        }


        // Setters
        /**
         * 
         */
        final public function setProfileId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }
            
            $this->profile_id = $var;
        }


        /**
         * 
         */
        final public function setPersonNameId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->person_name_id = $var;
        }


        /**
         * 
         */
        final public function setPersonAddressId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->person_address_id = $var;
        }


        /**
         * 
         */
        final public function setPersonEmailId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->person_email_id = $var;
        }


        /**
         * 
         */
        final public function setPersonPhone( $var )
        {
            $this->person_phone = $var;
        }


        /**
         * 
         */
        final public function setBirthday( $var )
        {
            $this->birthday = $var;
        }


        /**
         * 
         */
        final public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ProfileInformationModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }

        /**
         * 
         */
        final public function setRegistered( $var )
        {
            $this->registered = $var;
        }
        
    }
?>