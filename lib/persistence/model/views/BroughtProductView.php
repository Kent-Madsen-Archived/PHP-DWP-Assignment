<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface BroughtProductView
     */
    interface BroughtProductView
    {
        /**
         * @return mixed
         */
        public function viewIdentity();

        /**
         * @return mixed
         */
        public function viewInvoice();

        /**
         * @return mixed
         */
        public function viewNumberOfProducts();

        /**
         * @return mixed
         */
        public function viewPrice();

        /**
         * @return mixed
         */
        public function viewProduct();

        /**
         * @return mixed
         */
        public function viewRegistered();
    }
?>