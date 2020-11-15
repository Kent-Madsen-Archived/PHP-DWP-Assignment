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


        // implement interfaces
        /**
         * @return int|mixed|null
         */
        final public function viewIdentity()
        {
            if( $this->viewIsIdentityNull() )
            {
                return null;
            }

            return $this->getIdentity();
        }


        /**
         * @return bool
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->identity ) == true )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return mixed|null
         */
        final public function viewPersonAddress()
        {
            // TODO: Implement viewPersonAddress() method.
            return null;
        }


        /**
         * @return mixed|null
         */
        final public function viewPersonBirthday()
        {
            // TODO: Implement viewPersonBirthday() method.
            return null;
        }


        /**
         * @return mixed|null
         */
        final public function viewPersonEmail()
        {
            // TODO: Implement viewPersonEmail() method.
            return null;
        }


        /**
         * @return mixed|null
         */
        final public function viewPersonName()
        {
            // TODO: Implement viewPersonName() method.
            return null;
        }


        /**
         * @return mixed|null
         */
        final public function viewPhoneNumber()
        {
            // TODO: Implement viewPhoneNumber() method.
            return null;
        }


        /**
         * @return mixed|null
         */
        final public function viewProfile()
        {
            // TODO: Implement viewProfile() method.
            return null;
        }


        /**
         * @return mixed|void
         */
        final public function viewRegistered()
        {
            // TODO: Implement viewRegistered() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerRegistered($var)
        {
            // TODO: Implement controllerRegistered() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerBirthday($var)
        {
            // TODO: Implement controllerBirthday() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerPersonAddress($var)
        {
            // TODO: Implement controllerPersonAddress() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerPersonEmail($var)
        {
            // TODO: Implement controllerPersonEmail() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerPersonName($var)
        {
            // TODO: Implement controllerPersonName() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerPersonPhone($var)
        {
            // TODO: Implement controllerPersonPhone() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerProfile($var)
        {
            // TODO: Implement controllerProfile() method.
            return null;
        }


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return $retVal;
        }


        // variables
        private $identity = null;

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

            if( $factory instanceof ProfileInformationFactory )
            {
                $retval = true;
            }

            return boolval( $retval );
        }


        // accessors
            // Getters
        /**
         * @return int|null
         */
        final public function getIdentity()
        {
            if( is_null( $this->identity ) )
            {
                return null;
            }

            return intval( $this->identity, self::base() );
        }


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

            return intval( $this->profile_id, self::base() );
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

            return intval( $this->person_name_id, self::base() );
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

            return intval( $this->person_address_id, self::base() );
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

            return intval( $this->person_email_id, self::base() );
        }


        // Setters
        /**
         * @param $var
         * @throws Exception
         */
        final public function setProfileId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT );

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
            $value = filter_var( $var, FILTER_VALIDATE_INT );

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
            $value = filter_var( $var, FILTER_VALIDATE_INT   );

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