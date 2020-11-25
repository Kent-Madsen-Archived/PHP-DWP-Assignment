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
         * @param $model
         * @throws Exception
         */
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }


        /**
         * @param $model
         * @return bool
         */
        public function validateModel( $model ): bool
        {
            // TODO: Implement validateModel() method.
            return false;
        }


        /**
         * @param $var
         */
        public function controllerStreetName($var): void
        {

        }


        /**
         * @param $var
         */
        public function controllerStreetAddressNumber($var): void
        {

        }


        /**
         * @param $var
         */
        public function controllerStreetAddressFloor($var): void
        {

        }


        /**
         * @param $var
         */
        public function controllerStreetAddressZipCode($var): void
        {

        }


        /**
         * @param $var
         */
        public function controllerCountry($var): void
        {

        }
    }
?>