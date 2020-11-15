<?php

    /**
     * Class UserSession
     */
    class UserSession
    {

        /**
         * UserSession constructor.
         * @param $profileModel
         */
        public function __construct( $profileModel )
        {
            if( !( $profileModel == null ) )
            {
                $this->setIdentity( $profileModel->getIdentity() );
                $this->setUsername( $profileModel->getUsername() );
                
                $this->setProfileType( $profileModel->getProfileType() );
            }
        }

        // Variables
        private $identity = 0;

        private $username = null;
        private $profile_type = 0;

        /**
         * @return int
         */
        final public function getIdentity()
        {
            return $this->identity;
        }

        /**
         * @param $var
         */
        final public function setIdentity( $var )
        {
            $this->identity = $var;
        }

        /**
         * @param $var
         */
        final public function setUsername( $var )
        {
            $this->username = $var;
        }

        /**
         * @return null
         */
        final public function getUsername()
        {
            return $this->username;
        }

        /**
         * @param $var
         */
        final public function setProfileType( $var )
        {
            $this->profile_type = $var;
        }

        /**
         * @return int
         */
        final public function getProfileType()
        {
            return $this->profile_type;
        }
    }

?>