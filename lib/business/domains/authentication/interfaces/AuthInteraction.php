<?php
    /**
     *  Title: AuthInteraction
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Interface
     *  Project: DWP-Assignment
     */

    /**
     * Interface AuthInteraction
     */
    interface AuthInteraction
    {
        // login as user
        /**
         * @return ProfileModel|null
         */
        public function login(): ?ProfileModel;


        // registration process
        /**
         * @return ProfileModel|null
         */
        public function register(): ?ProfileModel;


        /**
         * @return bool
         */
        public function forgotMyPassword(): bool;


        // Forgot my password
        /**
         * @return bool
         */
        public function forgotMyPasswordUseEmail(): bool;


        /**
         * @return bool
         */
        public function forgotMyPasswordUseUsername( ): bool;
    }
?>