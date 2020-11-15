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
        extends BaseEntityView
    {
        /**
         * @return mixed
         */
        public function viewUsername();

        /**
         * @return mixed
         */
        public function viewPassword();

        /**
         * @return mixed
         */
        public function viewProfileType();
    }

?>