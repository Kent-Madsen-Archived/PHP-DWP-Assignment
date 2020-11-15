<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface AssociatedCategoryView
     */
    interface AssociatedCategoryView
    {
        /**
         * @return mixed
         */
        public function viewIdentity();

        /**
         * @return mixed
         */
        public function viewProduct();

        /**
         * @return mixed
         */
        public function viewAttribute();

        /**
         * @return mixed
         */
        public function viewCategory();
    }
?>