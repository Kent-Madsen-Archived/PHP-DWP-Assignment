<?php 

    class AssociatedCategoryModel 
        extends DatabaseModel
        implements AssociatedCategoryView,
                   AssociatedCategoryController
    {
        // Constructors
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }   

        // Variables
        private $identity = null;
        
        private $product_attribute_id = null;
        private $product_category_id  = null;
        private $product_id           = null;

        /**
         * 
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof AssociatedCategoryFactory )
            {
                return true;
            }

            return false;
        }

        // Accessors
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
        final public function getProductAttributeId()
        {
            return $this->product_attribute_id;
        }

        
        /**
         * 
         */
        final public function getProductCategoryId()
        {
            return $this->product_category_id;
        }


        /**
         * 
         */
        final public function getProductId()
        {
            return $this->product_id;
        }

            // Setters
        /**
         * 
         */
        final public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $var;
        }
  
        
        /**
        * 
        */
        final public function setProductAttributeId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setProductAttributeId: null or numeric number is allowed' );
            }
        
            $this->product_attribute_id = $var;
        }


        /**
         * 
         */
        final public function setProductCategoryId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setProductCategoryId: null or numeric number is allowed' );
            }

            $this->product_category_id = $var;
        }


        /**
         * 
         */
        final public function setProductId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setProductId: null or numeric number is allowed' );
            }

            $this->product_id = $var;
        }
    }

?>