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
        extends BaseEntityView
    {
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