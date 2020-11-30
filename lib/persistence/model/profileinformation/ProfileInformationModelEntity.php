<?php

    /**
     * Class ProfileInformationModel
     */
    class ProfileInformationModelEntity
        extends DatabaseModelEntity
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


        /**
         * @return false|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return $retVal;
        }


        // variables
        private $profile_id         = null;
        private $person_name_id     = null;
        private $person_address_id  = null;
        private $person_email_id    = null;

        private $person_phone   = null;
        private $birthday       = null;

        private $registered     = null;
        

        // implementation of factory classesd
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            $retval = false;

            if( $factory instanceof ProfileInformationBaseFactoryTemplate )
            {
                $retval = true;
            }

            return boolval( $retval );
        }


        // accessors
            // Getters
        /**
         * @return string|null
         */
        final public function getPersonPhone()
        {
            if( is_null( $this->person_phone ) )
            {
                return null;
            }

            return strval( $this->person_phone );
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
         * @return int|null
         */
        final public function getProfileId()
        {
            if( is_null( $this->profile_id ) )
            {
                return null;
            }

            return intval( $this->profile_id, BASE_10 );
        }


        /**
         * @return int|null
         */
        final public function getPersonNameId()
        {
            if( is_null( $this->person_name_id ) )
            {
                return null;
            }

            return intval( $this->person_name_id, BASE_10);
        }


        /**
         * @return int|null
         */
        final public function getPersonAddressId()
        {
            if( is_null( $this->person_address_id ) )
            {
                return null;
            }

            return intval( $this->person_address_id, BASE_10 );
        }


        /**
         * @return int|null
         */
        final public function getPersonEmailId()
        {
            if( is_null( $this->person_email_id ) )
            {
                return null;
            }

            return intval( $this->person_email_id, BASE_10 );
        }


        // Setters
        /**
         * @param $var
         * @throws Exception
         */
        final public function setProfileId( $var )
        {
            if( !is_int( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }
            
            $this->profile_id = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setPersonNameId( $var )
        {
            if( !is_int( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->person_name_id = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setPersonAddressId( $var )
        {
            if( !is_int( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->person_address_id = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setPersonEmailId( $var )
        {

            if( !is_int( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->person_email_id = $var;
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
         */
        final public function setRegistered( $var )
        {
            $this->registered = $var;
        }
        
    }
?>