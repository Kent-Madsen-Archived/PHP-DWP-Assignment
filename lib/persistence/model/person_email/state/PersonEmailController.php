<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class PersonEmailController
     */
    class PersonEmailController
        extends BaseMVCController
    {
        /**
         * @param PersonEmailModel|null $model
         * @throws Exception
         */
        public function __constructor( ?PersonEmailModel $model )
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