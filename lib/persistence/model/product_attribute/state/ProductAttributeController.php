<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProductAttributeController
     */
    class ProductAttributeController
        extends BaseMVCController
    {
        /**
         * @param ProductAttributeModel|null $model
         * @throws Exception
         */
        public function __constructor( ?ProductAttributeModel $model )
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
        public function controllerContent( $var ): void
        {

        }

        public function getContent()
        {

        }
    }
?>