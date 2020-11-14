<?php 

    class ProductAttributeModel 
        extends DatabaseModel
        implements ProductAttributeController,
                   ProductAttributeView
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
        private $identity = null;
        private $content  = null;

        /**
         * 
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ProductAttributeFactory )
            {
                return true;
            }

            return false;
        }

        // accessors
            // Getters
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
                throw new Exception( 'ProductAttributeModel - setIdentity: null or numeric number is allowed' );
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