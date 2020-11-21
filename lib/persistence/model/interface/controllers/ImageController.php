<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ImageController
     */
    interface ImageController
        extends BaseEntityController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function controllerImageSrc($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerImageType($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerTitle($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerAlt($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerParent($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerRegistered($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerLastUpdated($var);

    }
?>