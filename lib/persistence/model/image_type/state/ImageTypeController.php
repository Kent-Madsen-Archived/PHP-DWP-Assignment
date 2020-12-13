<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ImageTypeController
     */
    class ImageTypeController
        extends BaseMVCController
    {
        /**
         * @param ImageTypeModel|null $model
         * @throws Exception
         */
        public function __constructor( ?ImageTypeModel $model )
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