<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProductController
     */
    class ProductMVCController
        extends BaseMVCController
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
        public function controllerTitle( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerDescription( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerPrice( $var ): void
        {

        }
    }

?>