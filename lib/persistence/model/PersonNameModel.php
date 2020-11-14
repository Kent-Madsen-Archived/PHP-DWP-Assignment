<?php 

    /**
     * 
     */
    class PersonNameModel 
        extends DatabaseModel 
            implements PersonNameView, 
                       PersonNameController
    {
        // Constructors
        /**
         * 
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

        /**
         * 
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
         * 
         */
        final public function getIdentity()
        {
            return $this->identity;
        }

        /**
         * 
         */
        final public function getFirstName()
        {
            return $this->first_name;
        }

    
        /**
         * 
         */
        final public function getLastName()
        {
            return $this->last_name;
        }

        /**
         * 
         */
        final public function getMiddleName()
        {
            return $this->middle_name;
        }

            // Setters
        /**
         * 
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
         * 
         */
        final public function setFirstName( $var )
        {
            $this->first_name = $var;
        }

        /**
         * 
         */
        final public function setMiddleName( $var )
        {
            $this->middle_name = $var;
        }

        /**
         * 
         */
        final public function setLastName( $var )
        {
            $this->last_name = $var;
        }

    }


?>