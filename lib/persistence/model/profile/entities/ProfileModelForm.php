<?php
    /**
     *  Title: ProfileModelForm
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    class ProfileModelForm
        extends DatabaseFormEntity
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
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return null
         */
        final public function getPassword()
        {
            return $this->password;
        }


        /**
         * @return null
         */
        final public function getUsername()
        {
            return $this->username;
        }


        /**
         * @return null
         */
        final public function getProfileType()
        {
            return $this->profile_type;
        }


            // Setters
        /**
         * @param null $identity
         */
        final public function setIdentity( $identity ): void
        {
            $this->identity = $identity;
        }


        /**
         * @param null $password
         */
        final public function setPassword( $password ): void
        {
            $this->password = $password;
        }


        /**
         * @param null $profile_type
         */
        final public function setProfileType( $profile_type ): void
        {
            $this->profile_type = $profile_type;
        }


        /**
         * @param null $username
         */
        final public function setUsername( $username ): void
        {
            $this->username = $username;
        }

    }

?>