<?php

    /**
     * Class PersonNameModel
     */
    class PersonNameModel 
        extends DatabaseModel 
            implements PersonNameController
    {
        // Constructors
        /**
         * PersonNameModel constructor.
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
         * @return bool|mixed
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->identity ) == true )
            {
                $retVal = true;
            }

            return $retVal;
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
        private $first_name     = null;
        private $last_name      = null;
        private $middle_name    = null;

        private $identity       = null;


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof PersonNameFactory )
            {
                return true;
            }

            return false;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerFirstname( $var )
        {
            // TODO: Implement controllerFirstname() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerLastname( $var )
        {
            // TODO: Implement controllerLastname() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerMiddleName( $var )
        {
            // TODO: Implement controllerMiddleName() method.
            return null;
        }


        // accessors
            // getters
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
        final public function getFirstName()
        {
            if( is_null( $this->first_name ) )
            {
                return null;
            }

            return strval( $this->first_name );
        }


        /**
         * @return string|null
         */
        final public function getLastName()
        {
            if( is_null( $this->last_name ) )
            {
                return null;
            }

            return strval( $this->last_name );
        }


        /**
         * @return string|null
         */
        final public function getMiddleName()
        {
            if( is_null( $this->middle_name ) )
            {
                return null;
            }

            return strval( $this->middle_name );
        }


            // Setters
        /**
         * @param $var
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'PersonNameModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $value;
        }


        /**
         * @param $var
         */
        final public function setFirstName( $var )
        {
            $this->first_name = $var;
        }


        /**
         * @param $var
         */
        final public function setMiddleName( $var )
        {
            $this->middle_name = $var;
        }


        /**
         * @param $var
         */
        final public function setLastName( $var )
        {
            $this->last_name = $var;
        }

    }


?>