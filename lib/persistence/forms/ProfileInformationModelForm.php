<?php
    /**
     *  Title: ProfileInformationModelForm
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */


    /**
     * Class ProfileInformationModelForm
     */
    class ProfileInformationModelForm
        extends DatabaseForm
    {
        /**
         * ProfileInformationModelForm constructor.
         */
        public function __construct()
        {
            $this->setIsSet( false );
        }


        // Variables
        private $identity = null;

        private $profileId = null;

        private $firstname  = null;
        private $lastname   = null;
        private $middlename = null;

        private $address_country        = null;
        private $address_street_name    = null;
        private $address_number         = null;
        private $address_zip_code       = null;

        private $email = null;


        // Accessor
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
        public function getAddressCountry()
        {
            return $this->address_country;
        }


        /**
         * @return null
         */
        public function getAddressNumber()
        {
            return $this->address_number;
        }


        /**
         * @return null
         */
        public function getAddressStreetName()
        {
            return $this->address_street_name;
        }


        /**
         * @return null
         */
        public function getAddressZipCode()
        {
            return $this->address_zip_code;
        }


        /**
         * @return null
         */
        public function getEmail()
        {
            return $this->email;
        }


        /**
         * @return null
         */
        public function getFirstname()
        {
            return $this->firstname;
        }


        /**
         * @return null
         */
        public function getLastname()
        {
            return $this->lastname;
        }


        /**
         * @return null
         */
        public function getMiddlename()
        {
            return $this->middlename;
        }


        /**
         * @return null
         */
        public function getProfileId()
        {
            return $this->profileId;
        }


            // Setters
        /**
         * @param null $address_number
         */
        public function setAddressNumber($address_number): void
        {
            $this->address_number = $address_number;
        }


        /**
         * @param null $address_street_name
         */
        public function setAddressStreetName($address_street_name): void
        {
            $this->address_street_name = $address_street_name;
        }


        /**
         * @param null $address_zip_code
         */
        public function setAddressZipCode($address_zip_code): void
        {
            $this->address_zip_code = $address_zip_code;
        }


        /**
         * @param null $email
         */
        public function setEmail($email): void
        {
            $this->email = $email;
        }


        /**
         * @param null $firstname
         */
        public function setFirstname($firstname): void
        {
            $this->firstname = $firstname;
        }


        /**
         * @param null $lastname
         */
        public function setLastname($lastname): void
        {
            $this->lastname = $lastname;
        }


        /**
         * @param null $middlename
         */
        public function setMiddlename($middlename): void
        {
            $this->middlename = $middlename;
        }


        /**
         * @param null $profileId
         */
        public function setProfileId($profileId): void
        {
            $this->profileId = $profileId;
        }


        /**
         * @param null $identity
         */
        public function setIdentity($identity): void
        {
            $this->identity = $identity;
        }


        /**
         * @param null $address_country
         */
        public function setAddressCountry($address_country): void
        {
            $this->address_country = $address_country;
        }
    }

?>