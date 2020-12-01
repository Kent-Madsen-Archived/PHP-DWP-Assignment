<?php

    /**
     * Class ProfileModelEntity
     */
    class ProfileModel
        extends DatabaseModelEntity
    {
        // Constructor
        /**
         * ProfileModelEntity constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( ?ProfileFactory $factory )
        {
            $this->setFactory( $factory );
            $this->setIsPasswordHashed( false );
        }


        /**
         * @return bool
         */
        final public function requiredFieldsValidated(): bool
        {
            $username_has_input = !is_null( $this->username );
            $password_has_input = !is_null( $this->password );

            $profile_type_has_input = !is_null( $this->profile_type );

            $retVal = ($username_has_input&&$password_has_input&&$profile_type_has_input);

            return boolval( $retVal );
        }


        // Variables
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

            return intval( $this->profile_type, BASE_10 );
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
            if( !is_int( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->profile_type = $var;
        }

    }

?>