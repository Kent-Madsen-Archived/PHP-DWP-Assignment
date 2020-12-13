<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProfileTypeController
     */
    class ProfileTypeController
        extends BaseMVCController
    {
        /**
         * @param ProfileTypeModel|null $model
         * @throws Exception
         */
        public function __constructor( ?ProfileTypeModel $model )
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