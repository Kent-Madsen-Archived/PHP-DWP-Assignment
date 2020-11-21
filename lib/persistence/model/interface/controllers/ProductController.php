<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductController
     */
    interface ProductController
        extends BaseEntityController
    {

        /**
         * @param $var
         * @return mixed
         */
        public function controllerTitle( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerDescription( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerPrice( $var );
    }

?>