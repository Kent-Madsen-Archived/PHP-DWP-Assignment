<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class AssociatedCategoryController
     */
    class AssociatedCategoryController
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
        public function controllerAttribute( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerCategory( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerProduct( $var ): void
        {

        }
    }
?>