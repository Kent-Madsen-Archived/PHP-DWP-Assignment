<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface BroughtProductController
     */
    interface BroughtProductController
        extends BaseEntityController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function controllerInvoice( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerNumberOfProducts( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerPrice( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerProduct( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerRegistered( $var );
    }
?>