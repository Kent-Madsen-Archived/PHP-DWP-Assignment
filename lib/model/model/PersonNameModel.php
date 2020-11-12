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
        public function setIdentity( $var )
        {
            $this->identity = $var;
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
        public function setFirstName( $var )
        {
            $this->first_name = $var;
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
        public function setLastName( $var )
        {
            $this->last_name = $var;
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
        public function setMiddleName( $var )
        {
            $this->middle_name = $var;
        }

    }


?>