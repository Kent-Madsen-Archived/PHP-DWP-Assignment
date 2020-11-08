<?php 

    class PersonAddressModel 
        extends DatabaseModel
    {
        /**
         * 
         */
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        //
        private $identity;
        private $street_name;
        private $street_address_number;
        private $zip_code;
        private $country;

        //
        public function getIdentity()
        {
            return $this->identity;
        }

        public function setIdentity( $var )
        {
            $this->identity = $var;
        }

        public function getStreetName()
        {
            return $this->street_name;
        }

        public function setStreetName( $var )
        {
            $this->street_name = $var;
        }

        public function getStreetAddressNumber()
        {
            return $this->street_address_number;
        }

        public function setStreetAddressNumber( $var )
        {
            $this->street_address_number = $var;
        }

        public function getZipCode()
        {
            return $this->zip_code;
        }

        public function setZipCode( $var )
        {
            $this->zip_code = $var;
        }

        public function getCountry()
        {
            return $this->country;
        }

        public function setCountry( $var )
        {
            $this->country = $var;
        }

    }


?>