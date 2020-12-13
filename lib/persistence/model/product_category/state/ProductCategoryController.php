<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProductCategoryController
     */
    class ProductCategoryController
        extends BaseMVCController
    {
        /**
         * @param ProductCategoryModel|null $model
         * @throws Exception
         */
        public function __constructor( ?ProductCategoryModel $model )
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