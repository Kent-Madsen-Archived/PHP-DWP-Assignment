<?php

    /**
     * Class ProfileInformationModel
     */
    class ProfileInformationModel 
        extends DatabaseModel 
            implements ProfileInformationView, 
                       ProfileInformationController
    {
        // constructors
        /**
         * ProfileInformationModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( $factory )
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
        

        // implementation of factory classes

        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ProfileInformationFactory )
            {
                return true;
            }

            return false;
        }

        // accessors
            // Getters
        /**
         * @return int
         */
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return |null
         */
        final public function getPersonPhone()
        {
            return $this->person_phone;
        }


        /**
         * @return |null
         */
        final public function getBirthday()
        {
            return $this->birthday;
        }


        /**
         * @return |null
         */
        final public function getRegistered()
        {
            return $this->registered;
        }


        /**
         * @return int
         */
        final public function getProfileId()
        {
            return $this->profile_id;
        }


        /**
         * @return int
         */
        final public function getPersonNameId()
        {
            return $this->person_name_id;
        }


        /**
         * @return int
         */
        final public function getPersonAddressId()
        {
            return $this->person_address_id;
        }


        /**
         * @return int
         */
        final public function getPersonEmailId()
        {
            return $this->person_email_id;
        }


        // Setters

        /**
         * @param $var
         * @throws Exception
         */
        final public function setProfileId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }
            
            $this->profile_id = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setPersonNameId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->person_name_id = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setPersonAddressId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->person_address_id = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setPersonEmailId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->person_email_id = $value;
        }


        /**
         * @param $var
         */
        final public function setPersonPhone( $var )
        {
            $this->person_phone = $var;
        }


        /**
         * @param $var
         */
        final public function setBirthday( $var )
        {
            $this->birthday = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ProfileInformationModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $value;
        }

        /**
         * @param $var
         */
        final public function setRegistered( $var )
        {
            $this->registered = $var;
        }
        
    }
?>