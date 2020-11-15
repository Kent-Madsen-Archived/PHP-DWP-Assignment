<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductAttributeController
     */
    interface ProductAttributeController
        extends BaseEntityController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function controllerContent( $var );
    }
?>