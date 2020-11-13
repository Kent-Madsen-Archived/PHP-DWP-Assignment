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
        public function setIdentity( $var )
        {
            $this->identity = $var;
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
        public function setProductAttributeId( $var )
        {
            $this->product_attribute_id = $var;
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
        public function setProductCategoryId( $var )
        {
            $this->product_category_id = $var;
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
        public function setProductId( $var )
        {
            $this->product_id = $var;
        }
    }

?>