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
        extends BaseEntityView
    {
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