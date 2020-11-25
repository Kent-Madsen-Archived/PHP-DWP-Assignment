<?php

    /**
     * Class ProfileModel
     */
    class ProfileModel 
        extends DatabaseModel
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
            $this->setIsPasswordHashed( false );
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

            if( is_null( $this->identity ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }
        

        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerPassword( $var )
        {
            // TODO: Implement controllerPassword() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerUsername( $var )
        {
            // TODO: Implement controllerUsername() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerProfileType( $var )
        {
            // TODO: Implement controllerProfileType() method.
            return null;
        }


        /**
         * @return bool
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return boolval( $retVal );
        }


        // Variables
        private $identity = null;

        private $username = null;
        private $password = null;

        private $is_password_hashed = null;

        private $profile_type = null;


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            $retVal = false;

            if( $factory instanceof ProfileFactory )
            {
                $retVal = true;
            }

            return boolval( $retVal );
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
         * @return string|null
         */
        final public function getUsername()
        {
            if( is_null( $this->username ) )
            {
                return null;
            }

            return strval( $this->username );
        }


        /**
         * @return string|null
         */
        final public function getPassword()
        {
            if( is_null( $this->password ) )
            {
                return null;
            }

            return strval( $this->password );
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
            return boolval( $this->is_password_hashed );
        }


            // Setters
        /**
         * @param $var
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