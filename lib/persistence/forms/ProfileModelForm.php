<?php
    /**
     *  Title: ProfileModelForm
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    class ProfileModelForm
        extends DatabaseForm
    {
        public function __construct()
        {
            $this->setIsSet( false );
        }


        // Variables
        private $identity = null;

        private $username = null;
        private $password = null;

        private $profile_type = null;


        // Accessors
            // Getters
        /**
         * @return null
         */
        public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return null
         */
        public function getPassword()
        {
            return $this->password;
        }


        /**
         * @return null
         */
        public function getUsername()
        {
            return $this->username;
        }


        /**
         * @return null
         */
        public function getProfileType()
        {
            return $this->profile_type;
        }


            // Setters
        /**
         * @param null $identity
         */
        public function setIdentity($identity): void
        {
            $this->identity = $identity;
        }


        /**
         * @param null $password
         */
        public function setPassword($password): void
        {
            $this->password = $password;
        }


        /**
         * @param null $profile_type
         */
        public function setProfileType($profile_type): void
        {
            $this->profile_type = $profile_type;
        }


        /**
         * @param null $username
         */
        public function setUsername($username): void
        {
            $this->username = $username;
        }

    }

?>