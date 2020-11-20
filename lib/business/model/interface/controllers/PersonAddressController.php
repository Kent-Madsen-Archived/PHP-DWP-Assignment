<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface PersonAddressController
     */
    interface PersonAddressController
        extends BaseEntityController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function controllerStreetName($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerStreetAddressNumber($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerStreetAddressFloor($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerStreetAddressZipCode($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerCountry($var);
    }
?>