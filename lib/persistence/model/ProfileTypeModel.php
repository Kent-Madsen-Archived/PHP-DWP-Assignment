<?php 

    /**
     * 
     */
    class ProfileTypeModel 
        extends DatabaseModel
            implements ProfileTypeController, 
                       ProfileTypeView
    {
        // constructors
        
        /**
         * 
         */
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        // variables
        private $identity = 0;
        
        private $content = null;
        
        /**
         * 
         */
        protected function validateFactory( $factory )
        {
            if( $factory instanceof ProfileTypeFactory )
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
        public function getContent()
        {
            return $this->content;
        }
        
        /**
         * 
         */
        public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ProfileTypeModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $var;
        }

        /**
         * 
         */
        public function setContent( $var )
        {
            $this->content = $var;
        }

    }


?>