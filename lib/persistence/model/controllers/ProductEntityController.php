<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProductEntityController
     */
    class ProductEntityController
        extends BaseController
    {
        /**
         * @param $model
         * @throws Exception
         */
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }


        /**
         * @param $model
         * @return bool
         */
        public function validateModel( $model ): bool
        {
            // TODO: Implement validateModel() method.
            return false;
        }


        /**
         * @param $var
         */
        public function controllerArrived( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerEntityCode( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerProduct( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerBrought( $var ): void
        {

        }

    }
?>