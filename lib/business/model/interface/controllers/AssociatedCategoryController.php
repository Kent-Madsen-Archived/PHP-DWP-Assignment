<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface AssociatedCategoryController
     */
    interface AssociatedCategoryController
        extends BaseEntityController
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