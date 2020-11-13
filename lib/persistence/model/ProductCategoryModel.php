<?php 

    class ProductCategoryModel 
        extends DatabaseModel
        implements ProductCategoryController,
                   ProductCategoryView
    {
        // Constructors
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        // Variables
        private $identity = null;
        private $content  = null;

        /**
         * 
         */
        protected function validateFactory( $factory )
        {
            if( $factory instanceof ProductCategoryFactory )
            {
                return true;
            }

            return false;
        }

        // accessors
        /**
         * 
         */
        public function setIdentity( $var )
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
        public function setContent( $var )
        {
            $this->content = $var;
        }

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

    }

?>