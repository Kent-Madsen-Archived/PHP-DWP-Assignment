<?php 

    class ProductCategoryModel 
        extends DatabaseModel
        implements ProductCategoryController,
                   ProductCategoryView
    {
        // Constructors
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
            if( $factory instanceof ProductCategoryFactory )
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
                throw new Exception( 'ProductCategoryModel - setIdentity: null or numeric number is allowed' );
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