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
        public final function requiredFieldsValidated(): bool
        {
            $retVal = $this->requiredFieldsAreNotNull();

            return $retVal;
        }


        /**
         * @return bool
         */
        protected final function requiredFieldsAreNotNull(): bool
        {
            $street_address_name_is_not_null        = !$this->isStreetAddressNameNull();
            $street_address_number_is_not_null     = !$this->isStreetAddressNumberNull();

            $street_address_zip_code_is_not_null   = !$this->isZipCodeNull();
            $country_is_not_null                   = !$this->isCountryNull();

            $city_is_not_null = !$this->isCityNull();

            $A = $street_address_name_is_not_null && $street_address_number_is_not_null;
            $B = $street_address_zip_code_is_not_null && $country_is_not_null;
            $C = $city_is_not_null;

            $retVal = ($A && $B);

            return $retVal;
        }


        // Variables
        private $street_address_name            = null;
        private $street_address_number          = null;
        private $street_address_floor           = null;

        private $zip_code                       = null;

        private $city                           = null;
        private $country                        = null;

        private $controller = null;
        private $view       = null;


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        protected final function validateFactory( $factory )
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
         * @return PersonAddressView|null
         */
        public final function getView(): ?PersonAddressView
        {
            return $this->view;
        }


        /**
         * @return PersonAddressController|null
         */
        public final function getController(): ?PersonAddressController
        {
            return $this->controller;
        }


        /**
         * @return string|null
         */
        public final function getCity(): ?string
        {
            return $this->city;
        }


        /**
         * @return string|null
         */
        public final function getStreetAddressFloor(): ?string
        {
            return $this->street_address_floor;
        }


        /**
         * @return string|null
         */
        public final function getStreetAddressName(): ?string
        {
            return $this->street_address_name;
        }


        /**
         * @return string|null
         */
        public final function getZipCode(): ?string
        {
            return $this->zip_code;
        }


        /**
         * @return string|null
         */
        public final function getCountry(): ?string
        {
            return $this->country;
        }


        /**
         * @return int|null
         */
        public final function getStreetAddressNumber(): ?int
        {
            return $this->street_address_number;
        }


        // Setters
        /**
         * @param PersonAddressView $view
         */
        public final function setView( PersonAddressView $view ): void
        {
            $this->view = $view;
        }


        /**
         * @param PersonAddressController $controller
         */
        public final function setController( PersonAddressController $controller ): void
        {
            $this->controller = $controller;
        }


        /**
         * @param string|null $city
         */
        public final function setCity( ?string $city ): void
        {
            $this->city = $city;
        }


        /**
         * @param string|null $var
         */
        public final function setStreetAddressFloor( ?string $var ): void
        {
            $this->street_address_floor = $var;
        }


        /**
         * @param string|null $var
         */
        public final function setZipCode( ?string $var ): void
        {
            $this->zip_code = $var;
        }


        /**
         * @param string|null $var
         */
        public final function setCountry( ?string $var ): void
        {
            $this->country = $var;
        }


        /**
         * @param string|null $var
         */
        public final function setStreetAddressName( ?string $var ): void
        {
            $this->street_address_name = $var;
        }


        /**
         * @param int|null $var
         */
        public final function setStreetAddressNumber( ?int $var ): void
        {
            $this->street_address_number = $var;
        }


            // State accessors
        /**
         * @return bool
         */
        public final function isStreetAddressNameNull(): bool
        {
            $retVal = false;

            if( is_null( $this->street_address_name ) )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return bool
         */
        public final function isStreetAddressNumberNull(): bool
        {
            $retVal = false;

            if( is_null( $this->street_address_number ) )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return bool
         */
        public final function isStreetAddressFloorNull(): bool
        {
            $retVal = false;

            if( is_null( $this->street_address_floor ) )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return bool
         */
        public final function isZipCodeNull(): bool
        {
            $retVal = false;

            if( is_null( $this->zip_code ) )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return bool
         */
        public final function isCityNull(): bool
        {
            $retVal = false;

            if( is_null( $this->city ) )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return bool
         */
        public final function isCountryNull(): bool
        {
            $retVal = false;

            if( is_null( $this->country ) )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return bool
         */
        public final function isControllerNull(): bool
        {
            $retVal = false;

            if( is_null( $this->controller ) )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return bool
         */
        public final function isViewNull(): bool
        {
            $retVal = false;

            if( is_null( $this->view ) )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return PersonAddressView
         * @throws Exception
         */
        public final function generateView(): PersonAddressView
        {
            if( $this->isViewNull() )
            {
                return new PersonAddressView( $this );
            }

            return $this->getView();
        }


        /**
         * @return PersonAddressController
         */
        public final function generateController(): PersonAddressController
        {
            if( $this->isControllerNull() )
            {
                return new PersonAddressController($this);
            }

            return $this->getController();
        }

    }
?>