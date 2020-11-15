<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface AssociatedCategoryController
     */
    interface AssociatedCategoryController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function controllerAttribute( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerCategory( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerProduct( $var );
    }
?>