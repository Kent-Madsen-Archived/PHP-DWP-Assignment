<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface PageElementController
     */
    interface PageElementController
        extends BaseEntityController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function controllerAreaKey($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerTitle($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerContent($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerCreatedOn($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerLastUpdated($var);

    }
?>