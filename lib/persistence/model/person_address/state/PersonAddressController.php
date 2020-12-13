<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

/**
 * Class PersonAddressController
 */
    class PersonAddressController
    {
        /**
         * PersonAddressController constructor.
         * @param PersonAddressModel $model
         */
        public function __construct( PersonAddressModel $model )
        {
            $this->setModel( $model );

            $m = $this->getModel();

            if( $m->isControllerNull() )
            {
                $m->setController( $this );
            }
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


        /**
         * @param string $street_address_name
         * @throws Exception
         */
        public final function controllerStreetAddressName( string $street_address_name ): void
        {
            $m = $this->transformModel();

            // Filter
            $value = $street_address_name;

            // Append Changes
            $m->setStreetAddressName( $value );
        }


        /**
         * @param int $address_number
         * @throws Exception
         */
        public final function controllerStreetAddressNumber( int $address_number ): void
        {
            //
            $m = $this->transformModel();

            //
            $value = $address_number;

            // Append Changes
            $m->setStreetAddressNumber( $value );
        }


        /**
         * @param string|null $street_address_floor_input
         * @throws Exception
         */
        public final function controllerStreetAddressFloor( ?string $street_address_floor_input ): void
        {
            $m = $this->transformModel();

            $value = $street_address_floor_input;

            // Append Changes
            $m->setStreetAddressFloor( $value );
        }


        /**
         * @param string $zip_post_input
         * @throws Exception
         */
        public final function controllerZipCode( string $zip_post_input ): void
        {
            //
            $m = $this->transformModel();

            $value = $zip_post_input;

            $m->setZipCode( $value );
        }


        /**
         * @param string $city_input
         * @throws Exception
         */
        public final function controllerCity( string $city_input ): void
        {
            $m = $this->transformModel();

            $value = $city_input;

            $m->setCity( $value );
        }


        /**
         * @param string $country_input
         * @throws Exception
         */
        public final function controllerCountry( string $country_input ): void
        {
            $m = $this->transformModel();

            $value = $country_input;

            $m->setCountry( $value );
        }


        public function getStreetAddressName()
        {

        }

        public function getStreetAddressNumber()
        {

        }

        public function getStreetAddressFloor()
        {

        }

        public function getZipCode()
        {

        }

        public function getCity()
        {

        }

        public function getCountry()
        {
            
        }

    }
?>