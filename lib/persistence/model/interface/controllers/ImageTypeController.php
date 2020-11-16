<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ImageTypeController
     */
    interface ImageTypeController
        extends BaseEntityController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function controllerContent( $var );
    }
?>