<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class PersonAddressView
     */
    class PersonAddressView
    {
        /**
         * PersonAddressView constructor.
         * @param PersonAddressController|null $controller
         */
        public function __construct( ?PersonAddressController $controller )
        {
            $this->setController( $controller );
        }

        private $controller = null;

        /**
         * @param PersonAddressController|null $controller
         */
        public function setController( ?PersonAddressController $controller ): void
        {
            $this->controller = $controller;
        }

        /**
         * @return null
         */
        public final function getController(): ?PersonAddressController
        {
            return $this->controller;
        }




        /**
         * @return PersonAddressModel|null
         * @throws Exception
         */
        protected final function transformModel(): ?PersonAddressModel
        {
            if( $this->getModel() instanceof PersonAddressModel )
            {
                return $this->getModel();
            }

            return null;
        }


        // Variables
        private $toHideEmptyFields  = true;
        private $toCapitaliseWords  = true;
        private $toUppercaseWords   = false;


        // Functions
        /**
         * @param $model
         * @return bool
         */
        public final function validateModel( $model ): bool
        {
            $retval = false;

            if( $model instanceof PersonAddressModel )
            {
                $retval = true;
            }

            return boolval( $retval );
        }


        /**
         * @return int|null
         * @throws Exception
         */
        public final function viewIdentity(): ?int
        {
            return $this->getModel()->getIdentity();
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function viewFieldIdentity(): string
        {
            if( $this->isViewIdentityNull() )
            {
                if( $this->isToHideEmptyFields() )
                {
                    $number = 'nan';
                }
                else
                {
                    $number = 'identity has no data';
                }
            }
            else
            {
                $number = strval( $this->viewIdentity() );
            }

            return htmlentities("{$number}");
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function viewFieldStreetAddressName(): string
        {
            $m = $this->getModel();

            if( $this->isFieldStreetNameNull() )
            {
                if( $this->isToHideEmptyFields() )
                {
                    $name = '';
                }
                else
                {
                    $name = 'no Street address Name has been found';
                }
            }
            else
            {
                $name = $m->getStreetAddressName();
            }

            if( $this->isToCapitaliseWords() )
            {
                $name = ucfirst( $name );
            }

            $retVal = htmlentities( $name, null, 'UTF-8' );
            return $retVal;
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function viewFieldStreetAddressNumber(): string
        {
            $m = $this->getModel();

            if( $this->isFieldStreetAddressNumberNull() )
            {
                if( $this->isToHideEmptyFields() )
                {
                    $number_to_printed = '';
                }
                else
                {
                    $number_to_printed = 'no address number data found';
                }
            }
            else
            {
                $number_to_printed = strval( $m->getStreetAddressNumber() );
            }

            $retVal = $number_to_printed;
            return htmlentities($retVal, null, 'UTF-8');
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function viewFieldStreetAddressFloor(): string
        {
            $m = $this->getModel();

            if( $this->isFieldStreetAddressFloorNull() )
            {
                if( $this->isToHideEmptyFields() )
                {
                    $floor = '';
                }
                else
                {
                    $floor = 'no address floor data';
                }
            }
            else
            {
                $floor = strval( $m->getStreetAddressFloor() );

                if( $this->isToUppercaseWords() )
                {
                    $floor = strtoupper( $floor );
                }
            }

            return htmlentities("{$floor}", null, "UTF-8");
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function viewFieldZipCode(): string
        {
            $m = $this->getModel();

            if( $this->isFieldZipCodeNull() )
            {
                if( $this->isToHideEmptyFields() )
                {
                    $zip_code_value = '';
                }
                else
                {
                    $zip_code_value = 'No zip code data';
                }

            }
            else
            {
                $zip_code_value = $m->getZipCode();
            }

            $retVal = "{$zip_code_value}";
            return htmlentities($retVal, null, 'UTF-8');
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function viewFieldCountry(): string
        {
            if( $this->isFieldCountryNull() )
            {
                if( $this->isToHideEmptyFields() )
                {
                    $country = '';
                }
                else
                {
                    $country = strval( 'No country data.' );
                }
            }
            else
            {
                $country = strval( $this->getModel()->getCountry() );
            }


            if( $this->isToCapitaliseWords() )
            {
                $country = ucfirst( $country );
            }

            return htmlentities("{$country}");
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function viewFieldCity(): string
        {
            if( $this->isFieldCityNull() )
            {
                if( $this->isToHideEmptyFields() )
                {
                    $city_value_to_be_printed = strval(' ');
                }
                else
                {
                    $city_value_to_be_printed = strval( 'No city data.' );
                }
            }
            else
            {
                $city_value_to_be_printed = $this->getModel()->getCity();
            }

            if( $this->isToCapitaliseWords() )
            {
                $city_value_to_be_printed = ucfirst( $city_value_to_be_printed );
            }

            $f = strval($city_value_to_be_printed);
            return htmlentities("{$f}");
        }





        // Accessors
        /**
         * @return bool
         */
        public final function isToHideEmptyFields(): bool
        {
            return $this->toHideEmptyFields;
        }


        /**
         * @param bool|null $toHideEmptyFields
         */
        public final function setToHideEmptyFields( ?bool $toHideEmptyFields ): void
        {
            $this->toHideEmptyFields = $toHideEmptyFields;
        }


        /**
         * @return bool|null
         */
        public final function isToUppercaseWords(): ?bool
        {
            return $this->toUppercaseWords;
        }


        /**
         * @param bool|null $toUppercaseWords
         */
        public final function setToUppercaseWords( ?bool $toUppercaseWords ): void
        {
            $this->toUppercaseWords = $toUppercaseWords;
        }


        /**
         * @return bool|null
         */
        public final function isToCapitaliseWords(): ?bool
        {
            return $this->toCapitaliseWords;
        }


        /**
         * @param bool|null $toCapitaliseWords
         */
        public final function setToCapitaliseWords( ?bool $toCapitaliseWords ): void
        {
            $this->toCapitaliseWords = $toCapitaliseWords;
        }


        // Accessor States
        /**
         * @return bool|null
         * @throws Exception
         */
        public final function isViewIdentityNull(): ?bool
        {
            $retVal = false;

            $m = $this->getModel();

            if( is_null( $m->isIdentityNull() ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function isFieldCityNull(): bool
        {
            $m = $this->getModel();
            return is_null( $m->getCity() );
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function isFieldZipCodeNull(): bool
        {
            $m = $this->getModel();
            return is_null( $m->getZipCode() );
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function isFieldCountryNull(): bool
        {
            $m = $this->getModel();
            return is_null( $m->getCountry() );
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function isFieldStreetAddressFloorNull(): bool
        {
            $m = $this->getModel();
            return is_null( $m->getStreetAddressFloor() );
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function isFieldStreetAddressNumberNull(): bool
        {
            return is_null( $this->getModel()->getStreetAddressNumber() );
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function isFieldStreetNameNull(): bool
        {
            $m = $this->getModel();
            return is_null( $m->getStreetAddressName() );
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function printHomeAddressStandard(): string
        {
            $message= "{$this->viewFieldStreetAddressName()} {$this->viewFieldStreetAddressNumber()}.{$this->viewFieldStreetAddressFloor()}";
            return htmlentities($message);
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function printHomeAddressFullRange(): string
        {
            $country = $this->viewFieldCountry();
            $zip = $this->viewFieldZipCode();

            $street_address_name = $this->viewFieldStreetAddressName();
            $street_address_number = $this->viewFieldStreetAddressNumber();
            $street_address_city = '';

            $floor = $this->viewFieldStreetAddressFloor();

            $message = "{$street_address_name} {$street_address_number}.{$floor}, {$zip} {$street_address_city} {$country}.";
            return htmlentities($message);
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function printDenmarkFormatForHomeAddress(): string
        {
            $zip = $this->viewFieldZipCode();

            $street_address_name    = $this->viewFieldStreetAddressName();
            $street_address_number  = $this->viewFieldStreetAddressNumber();
            $street_address_city    = $this->viewFieldCity();

            $floor = $this->viewFieldStreetAddressFloor();

            $message = "{$street_address_name} {$street_address_number}, {$floor} </br> {$zip} {$street_address_city}";
            return $message;
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function printAddressZipCode(): string
        {
            $message="{$this->viewFieldZipCode()}";
            return htmlentities($message);
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function printAddressCountry(): string
        {
            $message="{$this->viewFieldCountry()}";
            return htmlentities($message);
        }
        
    }
?>