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

        // implement interfaces
        /**
         * @return int|mixed|null
         */
        final public function viewIdentity()
        {
            if( $this->viewIsIdentityNull() )
            {
                return null;
            }

            return $this->getIdentity();
        }

        /**
         * @return bool|mixed
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->identity ) == true )
            {
                $retVal = true;
            }

            return $retVal;
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


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerCountry( $var )
        {
            // TODO: Implement controllerCountry() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerStreetAddressFloor( $var )
        {
            // TODO: Implement controllerStreetAddressFloor() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerStreetAddressNumber( $var )
        {
            // TODO: Implement controllerStreetAddressNumber() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerStreetAddressZipCode( $var )
        {
            // TODO: Implement controllerStreetAddressZipCode() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerStreetName( $var )
        {
            // TODO: Implement controllerStreetName() method.
            return null;
        }


        // Accessors
            // getters
        /**
         * @return int|null
         */
        final public function getIdentity()
        {
            if( is_null( $this->identity ) )
            {
                return null;
            }

            return intval( $this->identity, self::base() );
        }


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
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'PersonAddressModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $value;
        }


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