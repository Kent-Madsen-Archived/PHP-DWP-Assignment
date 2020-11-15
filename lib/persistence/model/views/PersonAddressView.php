<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface PersonAddressView
     */
    interface PersonAddressView
    {
        /**
         * @return mixed
         */
        public function viewIdentity();

        /**
         * @return mixed
         */
        public function viewStreetName();

        /**
         * @return mixed
         */
        public function viewStreetAddressNumber();

        /**
         * @return mixed
         */
        public function viewStreetFloor();

        /**
         * @return mixed
         */
        public function viewZipCode();

        /**
         * @return mixed
         */
        public function viewCountry();
    }
?>