<?php

    /**
     * Class PersonNameModel
     */
    class PersonNameModel 
        extends DatabaseModel 
            implements PersonNameView, 
                       PersonNameController
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

        // accessors
            // getters
        /**
         * @return |null
         */
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return |null
         */
        final public function getFirstName()
        {
            return $this->first_name;
        }


        /**
         * @return |null
         */
        final public function getLastName()
        {
            return $this->last_name;
        }


        /**
         * @return |null
         */
        final public function getMiddleName()
        {
            return $this->middle_name;
        }


            // Setters
        /**
         * @param $var
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonNameModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
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