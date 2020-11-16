<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductEntityView
     */
    interface ProductEntityView
        extends BaseEntityView
    {
        /**
         * @return mixed
         */
        public function viewArrived();

        /**
         * @return mixed
         */
        public function viewEntityCode();

        /**
         * @return mixed
         */
        public function viewProduct();

        /**
         * @return mixed
         */
        public function viewBrought();

    }
?>