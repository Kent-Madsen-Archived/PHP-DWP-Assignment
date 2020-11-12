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
        public function setIdentity( $var )
        {
            $this->identity = $var;
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
        public function setStreetName( $var )
        {
            $this->street_name = $var;
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
        public function setStreetAddressNumber( $var )
        {
            $this->street_address_number = $var;
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
        public function setZipCode( $var )
        {
            $this->zip_code = $var;
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
        public function setCountry( $var )
        {
            $this->country = $var;
        }

    }


?>