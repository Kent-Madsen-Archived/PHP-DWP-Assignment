<?php 

    /**
     * 
     */
    class ProfileInformationModel 
        extends DatabaseModel 
            implements ProfileInformationView, 
                       ProfileInformationController
    {
        // constructors
        /**
         * 
         */
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        // variables
        private $identity = 0;

        private $profile_id         = 0;
        private $person_name_id     = 0;
        private $person_address_id  = 0;
        private $person_email_id    = 0;

        private $person_phone   = null;
        private $birthday       = null;

        private $registered = null;
        
        // accessors
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
        public function getIdentity()
        {
            return $this->identity;
        }

        /**
         * 
         */
        public function setProfileId( $var )
        {
            $this->profile_id = $var;
        }

        /**
         * 
         */
        public function getProfileId()
        {
            return $this->profile_id;
        }

        /**
         * 
         */
        public function setPersonNameId( $var )
        {
            $this->person_name_id = $var;
        }

        /**
         * 
         */
        public function getPersonNameId()
        {
            return $this->person_name_id;
        }

        /**
         * 
         */
        public function setPersonAddressId( $var )
        {
            $this->person_address_id = $var;
        }

        /**
         * 
         */
        public function getPersonAddressId()
        {
            return $this->person_address_id;
        }

        /**
         * 
         */
        public function setPersonEmailId( $var )
        {
            $this->person_email_id = $var;
        }

        /**
         * 
         */
        public function getPersonEmailId()
        {
            return $this->person_email_id;
        }

        /**
         * 
         */
        public function setPersonPhone( $var )
        {
            $this->person_phone = $var;
        }

        /**
         * 
         */
        public function getPersonPhone()
        {
            return $this->person_phone;
        }

        /**
         * 
         */
        public function setBirthday( $var )
        {
            $this->birthday = $var;
        }

        /**
         * 
         */
        public function getBirthday()
        {
            return $this->birthday;
        }

        /**
         * 
         */
        public function setRegistered( $var )
        {
            $this->registered = $var;
        }

        /**
         * 
         */
        public function getRegistered()
        {
            return $this->registered;
        }
        
    }
?>