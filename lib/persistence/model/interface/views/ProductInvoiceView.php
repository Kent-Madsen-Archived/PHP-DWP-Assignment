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
        extends BaseEntityView
    {
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