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
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        // Variables
        private $identity = null;
        
        private $street_name            = null;
        private $street_address_number  = null;
        private $zip_code               = null;
        private $country                = null;

        // Accessors
        /**
         * 
         */
        public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * 
         */
        public function getStreetName()
        {
            return $this->street_name;
        }
        
        /**
         * 
         */
        public function getStreetAddressNumber()
        {
            return $this->street_address_number;
        }


        /**
         * 
         */
        public function getZipCode()
        {
            return $this->zip_code;
        }

        /**
         * 
         */
        public function getCountry()
        {
            return $this->country;
        }


        /**
         * 
         */
        public function setIdentity( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }

        /**
         * 
         */
        public function setZipCode( $var )
        {
            $this->zip_code = $var;
        }

        /**
         * 
         */
        public function setCountry( $var )
        {
            $this->country = $var;
        }

        /**
         * 
         */
        public function setStreetName( $var )
        {
            $this->street_name = $var;
        }


        /**
         * 
         */
        public function setStreetAddressNumber( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->street_address_number = $var;
        }

    }


?>