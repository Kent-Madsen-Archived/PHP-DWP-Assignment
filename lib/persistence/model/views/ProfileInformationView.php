<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProfileInformationView
     */
    interface ProfileInformationView
    {
        /**
         * @return mixed
         */
        public function viewIdentity();

        /**
         * @return mixed
         */
        public function viewProfile();

        /**
         * @return mixed
         */
        public function viewPersonName();

        /**
         * @return mixed
         */
        public function viewPersonAddress();

        /**
         * @return mixed
         */
        public function viewPersonEmail();

        /**
         * @return mixed
         */
        public function viewPhoneNumber();

        /**
         * @return mixed
         */
        public function viewPersonBirthday();

        /**
         * @return mixed
         */
        public function viewRegistered();

    }
?>