<?php 

    /**
     * 
     */
    class PersonAddressModel 
        extends DatabaseModel 
            implements PersonAddressView,
                       PersonAddressController
    {
        // constructors
        /**
         * 
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        // Variables
        private $identity = null;
        
        private $street_name            = null;
        private $street_address_number  = null;
        private $zip_code               = null;
        private $country                = null;

        /**
         * 
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof PersonAddressFactory )
            {
                return true;
            }

            return false;
        }

        // Accessors
            // getters
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
        final public function getStreetName()
        {
            return $this->street_name;
        }
        
        /**
         * 
         */
        final public function getStreetAddressNumber()
        {
            return $this->street_address_number;
        }

        /**
         * 
         */
        final public function getZipCode()
        {
            return $this->zip_code;
        }

        /**
         * 
         */
        final public function getCountry()
        {
            return $this->country;
        }

            // Setters
        /**
         * 
         */
        final public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }

        /**
         * 
         */
        final public function setZipCode( $var )
        {
            $this->zip_code = $var;
        }

        /**
         * 
         */
        final public function setCountry( $var )
        {
            $this->country = $var;
        }

        /**
         * 
         */
        final public function setStreetName( $var )
        {
            $this->street_name = $var;
        }


        /**
         * 
         */
        final public function setStreetAddressNumber( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->street_address_number = $var;
        }

    }


?>