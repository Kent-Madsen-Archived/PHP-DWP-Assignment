<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductCategoryController
     */
    interface ProductCategoryController
        extends BaseEntityController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function controllerContent( $var );
    }
?>