<?php 

    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface PersonEmailView
     */
    interface PersonEmailView
    {
        /**
         * @return mixed
         */
        public function getContent();

        /**
         * @return mixed
         */
        public function getIdentity();
    }

?>