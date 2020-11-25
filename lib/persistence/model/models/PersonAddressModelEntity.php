<?php

    /**
     * Class PersonAddressModel
     */
    class PersonAddressModelEntity
        extends DatabaseModelEntity
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


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

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

            return intval( $this->street_address_number, self::base() );
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
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->street_address_number = $value;
        }

    }
?>