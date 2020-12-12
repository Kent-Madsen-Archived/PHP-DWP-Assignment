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
        /**
         * ProfileModelForm constructor.
         */
        public function __construct()
        {
            $this->setIsSet( false );
        }


        // Variables
        private $identity = null;

        private $username = null;
        private $password = null;

        private $profile_type = null;


        /**
         *
         */
        public final function isDone(): void
        {
            $this->setIsSet(true );
        }


        // Accessors
            // Getters
        /**
         * @return int|null
         */
        final public function getIdentity(): ?int
        {
            return $this->identity;
        }


        /**
         * @return string|null
         */
        public final function getPassword(): ?string
        {
            return $this->password;
        }


        /**
         * @return string|null
         */
        public final function getUsername(): ?string
        {
            return $this->username;
        }


        /**
         * @return string|null
         */
        public final function getProfileType(): ?string
        {
            return $this->profile_type;
        }


            // Setters

        /**
         * @param int|null $identity
         */
        public final function setIdentity( ?int $identity ): void
        {
            if( !$this->getIsSet() )
            {
                $this->identity = $identity;
            }
        }


        /**
         * @param string|null $password
         */
        public final function setPassword( ?string $password ): void
        {
            if( !$this->getIsSet() )
            {
                $this->password = $password;
            }
        }


        /**
         * @param string|null $profile_type
         */
        public final function setProfileType( ?string $profile_type ): void
        {
            if( !$this->getIsSet() )
            {
                $this->profile_type = $profile_type;
            }
        }


        /**
         * @param string|null $username
         */
        public final function setUsername( ?string $username ): void
        {
            if( !$this->getIsSet() )
            {
                $this->username = $username;
            }
        }

    }

?>