<?php

    /**
     * Class ProfileModel
     */
    class ProfileModel 
        extends DatabaseModel 
            implements ProfileView, 
                       ProfileController 
                        
    {
        // Constructor
        /**
         * ProfileModel constructor.
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
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return $retVal;
        }


        // Variables
        private $identity = null;

        private $username = null;
        private $password = null;

        private $is_password_hashed = false;

        private $profile_type = null;


        // implementation of factory classes

        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ProfileFactory )
            {
                return true;
            }

            return false;
        }

        
        // Accessors
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
         * @return mixed|null
         */
        final public function getUsername()
        {
            return $this->username;
        }


        /**
         * @return mixed|null
         */
        final public function getPassword()
        {
            return $this->password;
        }


        /**
         * @return int|null
         */
        final public function getProfileType()
        {
            if( is_null( $this->profile_type ) )
            {
                return null;
            }

            return intval( $this->profile_type, self::base() );
        }


        /**
         * @return bool
         */
        final public function getIsPasswordHashed()
        {
            return $this->is_password_hashed;
        }


            // Setters
        /**
         * @param $var
         * @return mixed|void
         */
        final public function setUsername( $var )
        {
            $this->username = $var;
        }


        /**
         * @param $var
         */
        final public function setIsPasswordHashed( $var )
        {
            $this->is_password_hashed = $var;
        }


        /**
         * @param $var
         * @return mixed|void
         */
        final public function setPassword( $var )
        {   
            $this->password = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setProfileType( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->profile_type = $var;
        }


        /**
         * @param $var
         * @return mixed|void
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ProfileModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $value;
        }
        

    }

?>