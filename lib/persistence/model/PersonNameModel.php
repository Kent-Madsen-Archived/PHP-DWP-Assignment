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
        function __construct( $factory )
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
        protected function validateFactory( $factory )
        {
            if( $factory instanceof PersonNameFactory )
            {
                return true;
            }

            return false;
        }

        // accessors
        /**
         * 
         */
        public function getIdentity()
        {
            return $this->identity;
        }

        /**
         * 
         */
        public function getFirstName()
        {
            return $this->first_name;
        }

    
        /**
         * 
         */
        public function getLastName()
        {
            return $this->last_name;
        }

        /**
         * 
         */
        public function getMiddleName()
        {
            return $this->middle_name;
        }

        /**
         * 
         */
        public function setIdentity( $var )
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
        public function setFirstName( $var )
        {
            $this->first_name = $var;
        }

        /**
         * 
         */
        public function setMiddleName( $var )
        {
            $this->middle_name = $var;
        }

        /**
         * 
         */
        public function setLastName( $var )
        {
            $this->last_name = $var;
        }

    }


?>