<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    interface AuthInteraction
    {
        // Login and Authenticate
        public function login( $username, $password );

        // Forgot my password
        public function forgot_my_password_by_email( $email );
        public function forgot_my_password_by_username( $username );
        
        // Register Profile
        public function register( $profile, $name, $email, $birthday, $phone_number, $address );
    }

?>