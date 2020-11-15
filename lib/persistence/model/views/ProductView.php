<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductView
     */
    interface ProductView
        extends BaseEntityView
    {
        /**
         * @return mixed
         */
        public function viewTitle();

        /**
         * @return mixed
         */
        public function viewDescription();

        /**
         * @return mixed
         */
        public function viewPrice();
    }
?>