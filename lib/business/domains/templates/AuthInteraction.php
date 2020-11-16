<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface AuthInteraction
     */
    interface AuthInteraction
    {
        /**
         * @param $username
         * @param $password
         * @return mixed
         */
        public function login( $username, $password );

        // Forgot my password
        /**
         * @param $email
         * @return mixed
         */
        public function forgot_my_password_by_email( $email );


        /**
         * @param $username
         * @return mixed
         */
        public function forgot_my_password_by_username( $username );


        /**
         * @param $profile
         * @param $name
         * @param $email
         * @param $birthday
         * @param $phone_number
         * @param $address
         * @return mixed
         */
        public function register( $profile, $name, $email, $birthday, $phone_number, $address );
    }

?>