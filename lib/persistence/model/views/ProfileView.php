<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProfileView
     */
    interface ProfileView
    {
        /**
         * @return mixed
         */
        public function getIdentity();

        /**
         * @return mixed
         */
        public function getUsername();

        /**
         * @return mixed
         */
        public function getPassword();
    }

?>