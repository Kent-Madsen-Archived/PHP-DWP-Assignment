<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductInvoiceView
     */
    interface ProductInvoiceView
    {
        /**
         * @return mixed
         */
        public function viewId();

        /**
         * @return mixed
         */
        public function viewTotalPrice();

        /**
         * @return mixed
         */
        public function viewOwnerAddress();

        /**
         * @return mixed
         */
        public function viewOwnerMail();

        /**
         * @return mixed
         */
        public function viewOwnerName();
    }
?>