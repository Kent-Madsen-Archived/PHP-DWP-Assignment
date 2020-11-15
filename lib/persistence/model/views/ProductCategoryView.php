<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductCategoryView
     */
    interface ProductCategoryView
        extends BaseEntityView
    {
        /**
         * @return mixed
         */
        public function viewContent();

    }
?>