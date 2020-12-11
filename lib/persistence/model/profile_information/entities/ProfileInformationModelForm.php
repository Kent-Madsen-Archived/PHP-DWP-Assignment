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
        extends DatabaseFormEntity
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
        private $address_street_floor         = null;
        private $address_city         = null;
        private $address_zip_code       = null;

        private $person_phone = null;
        private $person_birthday = null;

        private $email = null;

        public final function isDone()
        {
            $this->setIsSet(true );
        }


        // Accessor
            // Getters
        /**
         * @return int|null
         */
        final public function getIdentity(): ?int
        {
            return $this->identity;
        }

        /**
         * @return null
         */
        public function getPersonPhone(): ?string
        {
            return $this->person_phone;
        }


        /**
         * @return string|null
         */
        final public function getAddressCountry(): ?string
        {
            return $this->address_country;
        }


        /**
         * @return int|null
         */
        final public function getAddressNumber(): ?int
        {
            return $this->address_number;
        }


        /**
         * @return string|null
         */
        final public function getAddressStreetName(): ?string
        {
            return $this->address_street_name;
        }


        /**
         * @return string|null
         */
        final public function getAddressZipCode(): ?string
        {
            return $this->address_zip_code;
        }

        /**
         * @return string|null
         */
        public function getAddressCity(): ?string
        {
            return $this->address_city;
        }


        /**
         * @return string|null
         */
        final public function getEmail(): ?string
        {
            return $this->email;
        }


        /**
         * @return string|null
         */
        final public function getFirstname(): ?string
        {
            return $this->firstname;
        }


        /**
         * @return string|null
         */
        final public function getLastname(): ?string
        {
            return $this->lastname;
        }


        /**
         * @return string|null
         */
        final public function getMiddlename(): ?string
        {
            return $this->middlename;
        }

        /**
         * @return null
         */
        public function getPersonBirthday(): ?string
        {
            return $this->person_birthday;
        }


        /**
         * @return int|null
         */
        final public function getProfileId(): ?int
        {
            return $this->profileId;
        }

        /**
         * @return string|null
         */
        public function getAddressStreetFloor(): ?string
        {
            return $this->address_street_floor;
        }


            // Setters
        /**
         * @param int|null $address_number
         */
        final public function setAddressNumber( ?int $address_number ): void
        {
            if( !$this->getIsSet() )
            {
                $this->address_number = $address_number;
            }
        }


        /**
         * @param string|null $address_street_name
         */
        final public function setAddressStreetName( ?string $address_street_name ): void
        {
            if( !$this->getIsSet() )
            {
                $this->address_street_name = $address_street_name;
            }
        }


        /**
         * @param string|null $address_zip_code
         */
        final public function setAddressZipCode( ?string $address_zip_code ): void
        {
            if( !$this->getIsSet() )
            {
                $this->address_zip_code = $address_zip_code;
            }
        }

        /**
         * @param string|null $person_phone
         */
        public function setPersonPhone( ?string $person_phone ): void
        {
            if(!$this->getIsSet())
            {
                $this->person_phone = $person_phone;
            }
        }

        /**
         * @param string|null $address_city
         */
        public function setAddressCity( ?string $address_city ): void
        {
            if(!$this->getIsSet())
            {
                $this->address_city = $address_city;
            }
        }

        /**
         * @param string|null $person_birthday
         */
        public function setPersonBirthday(?string $person_birthday): void
        {
            if(!$this->getIsSet())
            {
                $this->person_birthday = $person_birthday;
            }
        }

        /**
         * @param string|null $address_street_floor
         */
        public function setAddressStreetFloor( ?string $address_street_floor ): void
        {
            if(!$this->getIsSet())
            {
                $this->address_street_floor = $address_street_floor;
            }
        }


        /**
         * @param string|null $email
         */
        final public function setEmail( ?string $email ): void
        {
            if(!$this->getIsSet())
            {
                $this->email = $email;
            }
        }


        /**
         * @param string|null $firstname
         */
        final public function setFirstname( ?string $firstname ): void
        {
            if(!$this->getIsSet())
            {
                $this->firstname = $firstname;
            }
        }


        /**
         * @param string|null $lastname
         */
        final public function setLastname( ?string $lastname ): void
        {
            if(!$this->getIsSet())
            {
                $this->lastname = $lastname;
            }
        }


        /**
         * @param string|null $middlename
         */
        final public function setMiddlename( ?string $middlename ): void
        {
            if(!$this->getIsSet())
            {
                $this->middlename = $middlename;
            }
        }


        /**
         * @param int|null $profileId
         */
        final public function setProfileId( ?int $profileId ): void
        {
            if(!$this->getIsSet())
            {
                $this->profileId = $profileId;
            }
        }


        /**
         * @param int|null $identity
         */
        final public function setIdentity( ?int $identity ): void
        {
            if(!$this->getIsSet())
            {
                $this->identity = $identity;
            }
        }


        /**
         * @param string|null $address_country
         */
        final public function setAddressCountry( ?string $address_country ): void
        {
            if(!$this->getIsSet())
            {
                $this->address_country = $address_country;
            }
        }
    }

?>