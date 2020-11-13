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


        // Accessors
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
        public function getProductAttributeId()
        {
            return $this->product_attribute_id;
        }

        
        /**
         * 
         */
        public function getProductCategoryId()
        {
            return $this->product_category_id;
        }


        /**
         * 
         */
        public function getProductId()
        {
            return $this->product_id;
        }

        /**
         * 
         */
        public function setIdentity( $var )
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
        public function setProductAttributeId( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setProductAttributeId: null or numeric number is allowed' );
            }
        
            $this->product_attribute_id = $var;
        }


        /**
         * 
         */
        public function setProductCategoryId( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setProductCategoryId: null or numeric number is allowed' );
            }

            $this->product_category_id = $var;
        }


        /**
         * 
         */
        public function setProductId( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setProductId: null or numeric number is allowed' );
            }

            $this->product_id = $var;
        }
    }

?>