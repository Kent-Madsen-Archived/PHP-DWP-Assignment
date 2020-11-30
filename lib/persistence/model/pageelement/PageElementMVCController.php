<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class PageElementController
     */
    class PageElementMVCController
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
        public function controllerAreaKey($var): void
        {

        }


        /**
         * @param $var
         */
        public function controllerTitle($var): void
        {

        }


        /**
         * @param $var
         */
        public function controllerContent($var): void
        {

        }


        /**
         * @param $var
         */
        public function controllerCreatedOn($var): void
        {

        }


        /**
         * @param $var
         */
        public function controllerLastUpdated($var): void
        {

        }

    }
?>