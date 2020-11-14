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
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }


        // variables
        private $identity = 0;
        
        private $content = null;
        

        // implementation of factory classes
        /**
         * 
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ProfileTypeFactory )
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
        final public function getContent()
        {
            return $this->content;
        }
        

            // setters
        /**
         * 
         */
        final public function setIdentity( $var )
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
        final public function setContent( $var )
        {
            $this->content = $var;
        }

    }
?>