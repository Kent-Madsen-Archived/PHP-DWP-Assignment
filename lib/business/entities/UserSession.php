<?php 
    /**
     * 
     */
    class UserSession
    {
        /**
         * 
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

        //
        private $identity = 0;
        private $username = null;
        private $profile_type = 0;

        /**
         * 
         */
        public function getIdentity()
        {
            return $this->identity;
        }

        /**
         * 
         */
        public function setIdentity( $var )
        {
            $this->identity = $var;
        }

        /**
         * 
         */
        public function setUsername( $var )
        {
            $this->username = $var;
        }

        /**
         * 
         */
        public function getUsername()
        {
            return $this->username;
        }

        /**
         * 
         */
        public function setProfileType( $var )
        {
            $this->profile_type = $var;
        }

        /**
         * 
         */
        public function getProfileType()
        {
            return $this->profile_type;
        }
    }

?>