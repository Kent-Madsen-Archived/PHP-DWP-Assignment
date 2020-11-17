<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductEntityController
     */
    interface ProductEntityController
        extends BaseEntityController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function controllerArrived( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerEntityCode( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerProduct( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerBrought( $var );

    }
?>