<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProfileInformationController
     */
    class ProfileInformationController
        extends BaseMVCController
    {
        /**
         * @param ProfileInformationModel|null $model
         * @throws Exception
         */
        public function __constructor( ?ProfileInformationModel $model )
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
        public function controllerProfile( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerPersonName( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerPersonAddress( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerPersonEmail( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerPersonPhone( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerBirthday( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerRegistered( $var ): void
        {

        }

        public function getProfile()
        {

        }

        public function getPersonName()
        {

        }

        public function getPersonAddress()
        {

        }

        public function getPersonEmail()
        {

        }

        public function getPersonPhone()
        {

        }

        public function getBirthday()
        {

        }

        public function getRegistered()
        {

        }
    }
?>