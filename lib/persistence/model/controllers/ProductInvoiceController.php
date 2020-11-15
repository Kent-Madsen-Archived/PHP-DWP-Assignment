<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductInvoiceController
     */
    interface ProductInvoiceController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function controllerTotalPrice( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerRegistered( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerAddress( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerMail( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerOwnerName( $var );
    }
?>