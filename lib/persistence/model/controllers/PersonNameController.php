<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface PersonNameController
     */
    interface PersonNameController
        extends BaseEntityController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function controllerFirstname($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerLastname($var);


        /**
         * @param $var
         * @return mixed
         */
        public function controllerMiddleName($var);
    }

?>