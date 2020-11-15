<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProfileInformationController
     */
    interface ProfileInformationController
    {

        /**
         * @param $var
         * @return mixed
         */
        public function controllerProfile( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function controllerPersonName( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function controllerPersonAddress( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function controllerPersonEmail( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function controllerPersonPhone( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function controllerBirthday( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function controllerRegistered( $var );
    }
?>