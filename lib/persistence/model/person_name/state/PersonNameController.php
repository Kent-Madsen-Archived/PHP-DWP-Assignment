<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class PersonNameController
     */
    class PersonNameController
        extends BaseMVCController
    {
        /**
         * @param PersonNameModel|null $model
         * @throws Exception
         */
        public function __construct( ?PersonNameModel $model )
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

        public function getFirstname()
        {

        }

        public function getLastname()
        {

        }

        public function getMiddlename()
        {

        }
    }

?>