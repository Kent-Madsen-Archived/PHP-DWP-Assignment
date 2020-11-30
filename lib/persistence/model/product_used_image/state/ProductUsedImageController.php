<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProductUsedImageController
     */
    class ProductUsedImageController
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
        public function controllerProduct( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerImageFull( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerImagePreview( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerIsProfileImage( $var ): void
        {

        }
    }
?>