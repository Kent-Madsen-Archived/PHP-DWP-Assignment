<?php

    /**
     * Class PersonAddressModel
     */
    class PersonAddressModel 
        extends DatabaseModel 
            implements PersonAddressView,
                       PersonAddressController
    {
        // constructors
        /**
         * PersonAddressModel constructor.
         * @param $factory
         * @throws Exception
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
        private $street_floor           = null;


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof PersonAddressFactory )
            {
                return true;
            }

            return false;
        }


        /**
         * @return mixed|null
         */
        final public function viewId()
        {
            return $this->getIdentity();
        }


        /**
         * @return mixed|null
         */
        final public function viewStreetName()
        {
            return $this->getStreetName();
        }


        /**
         * @return mixed|null
         */
        final public function viewStreetFloor()
        {
            return $this->getStreetFloor();
        }


        /**
         * @return mixed|null
         */
        final public function viewZipCode()
        {
            return $this->getZipCode();
        }


        /**
         * @return mixed|null
         */
        final public function viewCountry()
        {
            return $this->getCountry();
        }


        /**
         * @return mixed|null
         */
        final public function viewStreetAddressNumber()
        {
            return $this->getStreetAddressNumber();
        }


        // Accessors
            // getters
        /**
         * @return |null
         */
        final public function getIdentity()
        {
            return $this->identity;
        }

        /**
         * @return |null
         */
        final public function getStreetFloor()
        {
            return $this->street_floor;
        }

        /**
         * @param $var
         */
        final public function setStreetFloor( $var )
        {
            $this->street_floor = $var;
        }

        /**
         * @return |null
         */
        final public function getStreetName()
        {
            return $this->street_name;
        }


        /**
         * @return |null
         */
        final public function getStreetAddressNumber()
        {
            return $this->street_address_number;
        }


        /**
         * @return |null
         */
        final public function getZipCode()
        {
            return $this->zip_code;
        }


        /**
         * @return |null
         */
        final public function getCountry()
        {
            return $this->country;
        }

            // Setters

        /**
         * @param $var
         * @throws Exception
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
         * @param $var
         */
        final public function setZipCode( $var )
        {
            $this->zip_code = $var;
        }


        /**
         * @param $var
         */
        final public function setCountry( $var )
        {
            $this->country = $var;
        }


        /**
         * @param $var
         */
        final public function setStreetName( $var )
        {
            $this->street_name = $var;
        }


        /**
         * @param $var
         * @throws Exception
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