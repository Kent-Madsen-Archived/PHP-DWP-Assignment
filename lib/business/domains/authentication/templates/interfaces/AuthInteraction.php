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
         * @return ProfileModelEntity|null
         */
        public function login(): ?ProfileModelEntity;


        // registration process
        /**
         * @return ProfileModelEntity|null
         */
        public function register(): ?ProfileModelEntity;


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