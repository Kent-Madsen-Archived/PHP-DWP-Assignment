<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface PersonNameView
     */
    interface PersonNameView
    {
        /**
         * @return mixed
         */
        public function viewIdentity();

        /**
         * @return mixed
         */
        public function viewFirstname();

        /**
         * @return mixed
         */
        public function viewLastname();


        /**
         * @return mixed
         */
        public function viewMiddlename();

    }
?>