<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductController
     */
    interface ProductController
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