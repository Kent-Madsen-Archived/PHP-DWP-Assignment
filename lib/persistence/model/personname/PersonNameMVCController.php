<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class PersonNameController
     */
    class PersonNameMVCController
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
        public function controllerFirstname($var): void
        {

        }


        /**
         * @param $var
         */
        public function controllerLastname($var): void
        {

        }


        /**
         * @param $var
         */
        public function controllerMiddleName($var): void
        {

        }
    }

?>