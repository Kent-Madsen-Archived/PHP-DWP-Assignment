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
        extends BaseMVCView
    {
        /**
         * PersonAddressView constructor.
         * @param PersonAddressModel|null $model
         * @throws Exception
         */
        public function __construct( ?PersonAddressModel $model )
        {
            $this->setModel( $model );
        }


        // Variables
        private $toHideEmptyFields  = false;
        private $toCapitaliseWords  = true;
        private $toUppercaseWords   = true;


        // Functions
        /**
         * @param $model
         * @return bool
         */
        final public function validateModel( $model ): bool
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
        public final function viewFieldIdentity():string
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
        public final function viewFieldStreetName(): string
        {
            if( $this->isFieldStreetNameNull() )
            {
                if( $this->isToHideEmptyFields() )
                {
                    $name = '';
                }
                else
                {
                    $name = 'No Street address Name has been found';
                }
            }
            else
            {
                $name = $this->getModel()->getStreetName();
            }

            if($this->isToCapitaliseWords())
            {
                $name = ucfirst( $name );
            }

            return htmlentities("{$name}");
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function viewFieldStreetAddressNumber(): string
        {
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
                $number_to_printed = strval( $this->getModel()->getStreetAddressNumber() );
            }

            return htmlentities("{$number_to_printed}");
        }


        /**
         * @return string
         * @throws Exception
         */
        public final function viewFieldStreetAddressFloor(): string
        {
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
                $floor = strval( $this->getModel()->getStreetFloor() );

                if( $this->isToUppercaseWords() )
                {
                    $floor = strtoupper( $floor );
                }
            }

            return htmlentities("{$floor}");;
        }


        /**
         * @return string
         * @throws Exception
         */
        final public function viewFieldZipCode(): string
        {
            $z =  $this->getModel();

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
                $zip_code_value = $z->getZipCode();
            }

            return htmlentities("{$zip_code_value}");
        }


        /**
         * @return string
         * @throws Exception
         */
        final public function viewFieldCountry(): string
        {
            $c = $this->getModel();


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
                $country = strval( $c->getCountry() );
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
        final public function viewFieldCity(): string
        {
            if( $this->isFieldCityNull() )
            {
                if( $this->isToHideEmptyFields() )
                {
                    $city_value_to_be_printed = strval('');
                }
                else
                {
                    $city_value_to_be_printed = strval( 'No city data.' );
                }
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

            if( is_null( $this->getModel()->getIdentity() ) == true )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public function isFieldCityNull(): bool
        {
            return is_null( null );
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public function isFieldZipCodeNull(): bool
        {
            return is_null( $this->getModel()->getZipCode() );
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public function isFieldCountryNull(): bool
        {
            $m = $this->getModel();
            return is_null( $m->getCountry() );
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public function isFieldStreetAddressFloorNull():bool
        {
            return is_null( $this->getModel()->getStreetFloor() );
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public function isFieldStreetAddressNumberNull(): bool
        {
            return is_null( $this->getModel()->getStreetAddressNumber() );
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public function isFieldStreetNameNull(): bool
        {
            return is_null( $this->getModel()->getStreetName() );
        }


        /**
         * @return string
         * @throws Exception
         */
        final public function printHomeAddressStandard():string
        {
            $message= "{$this->viewFieldStreetName()} {$this->viewFieldStreetAddressNumber()}.{$this->viewFieldStreetAddressFloor()}";
            return htmlentities($message);
        }


        /**
         * @return string
         * @throws Exception
         */
        final public function printHomeAddressFullRange():string
        {
            $country = $this->viewFieldCountry();
            $zip = $this->viewFieldZipCode();

            $street_address_name = $this->viewFieldStreetName();
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
        final public function printDenmarkFormatForHomeAddress(): string
        {
            $zip = $this->viewFieldZipCode();

            $street_address_name = $this->viewFieldStreetName();
            $street_address_number = $this->viewFieldStreetAddressNumber();
            $street_address_city = $this->viewFieldCity();

            $floor = htmlentities($this->viewFieldStreetAddressFloor());

            $message = "{$street_address_name} {$street_address_number}, {$floor} </br> {$zip} {$street_address_city}";
            return $message;
        }




        /**
         * @return string
         * @throws Exception
         */
        final public function printAddressZipCode():string
        {
            $message="{$this->viewFieldZipCode()}";
            return htmlentities($message);
        }

        /**
         * @return string
         * @throws Exception
         */
        final public function printAddressCountry():string
        {
            $message="{$this->viewFieldCountry()}";
            return htmlentities($message);
        }


        
    }
?>