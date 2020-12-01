<?php

    /**
     * Class PersonAddressModel
     */
    class PersonAddressModel
        extends DatabaseModelEntity
    {
        // constructors
        /**
         * PersonAddressModel constructor.
         * @param PersonAddressFactory|null $factory
         * @throws Exception
         */
        public function __construct( ?PersonAddressFactory $factory )
        {
            $this->setFactory( $factory );
        }


        /**
         * @return bool
         */
        final public function requiredFieldsValidated(): bool
        {
            $retVal = false;

            $street_name_has_input = !is_null($this->street_name);
            $street_address_number_has_input = !is_null($this->street_address_number);
            $street_address_zip_code_has_input = !is_null($this->zip_code);
            $country_has_input = !is_null($this->country);

            $retVal = ($street_name_has_input && $street_address_number_has_input && $street_address_zip_code_has_input && $country_has_input);

            return $retVal;
        }


        // Variables
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


        // Accessors
            // getters
        /**
         * @return string|null
         */
        final public function getStreetFloor()
        {
            if( is_null( $this->street_floor ) )
            {
                return null;
            }

            return strval( $this->street_floor );
        }


        /**
         * @return string|null
         */
        final public function getStreetName()
        {
            if( is_null( $this->street_name ) )
            {
                return null;
            }

            return strval( $this->street_name );
        }


        /**
         * @return string|null
         */
        final public function getZipCode()
        {
            if( is_null( $this->zip_code ) )
            {
                return null;
            }

            return strval( $this->zip_code );
        }


        /**
         * @return string|null
         */
        final public function getCountry()
        {
            if( is_null( $this->country ) )
            {
                return null;
            }

            return strval( $this->country );
        }


        /**
         * @return int|null
         */
        final public function getStreetAddressNumber()
        {
            if( is_null( $this->street_address_number ) )
            {
                return null;
            }

            return intval( $this->street_address_number, BASE_10 );
        }


            // Setters
        /**
         * @param $var
         */
        final public function setStreetFloor( $var )
        {
            $this->street_floor = $var;
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
            if( !is_int( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->street_address_number = intval( $var, BASE_10 );
        }

    }
?>