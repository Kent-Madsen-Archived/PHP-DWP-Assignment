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
        public function viewIdentity();

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

        /**
         * @return mixed
         */
        public function viewRegistered();
    }
?>