<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class PageElementController
     */
    class PageElementController
        extends BaseMVCController
    {
        /**
         * @param PageElementModel|null $model
         * @throws Exception
         */
        public function __construct( ?PageElementModel $model )
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

        public function getAreaKey()
        {

        }

        public function getTitle()
        {

        }

        public function getContent()
        {

        }

        public function getCreatedOn()
        {

        }

        public function getLastUpdated()
        {

        }

    }
?>