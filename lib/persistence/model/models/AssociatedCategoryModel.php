<?php

    /**
     * Class AssociatedCategoryModel
     */
    class AssociatedCategoryModel 
        extends DatabaseModel
        implements AssociatedCategoryView,
                   AssociatedCategoryController
    {
        // Constructors
        /**
         * AssociatedCategoryModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }   

        
        // Variables
        private $identity = null;
        
        private $product_attribute_id = null;
        private $product_category_id  = null;
        private $product_id           = null;


        // implementation of factory classes

        /**
         * @param $factory
         * @return bool|mixed
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
         * @return |null
         */
        final public function getIdentity()
        {
            return $this->identity;
        }

        /**
         * @return |null
         */
        final public function getProductAttributeId()
        {
            return $this->product_attribute_id;
        }


        /**
         * @return |null
         */
        final public function getProductCategoryId()
        {
            return $this->product_category_id;
        }


        /**
         * @return |null
         */
        final public function getProductId()
        {
            return $this->product_id;
        }

            // Setters
        /**
         * @param $var
         * @throws Exception
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
         * @param $var
         * @throws Exception
         */
        final public function setProductAttributeId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setProductAttributeId: null or numeric number is allowed' );
            }
        
            $this->product_attribute_id = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setProductCategoryId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setProductCategoryId: null or numeric number is allowed' );
            }

            $this->product_category_id = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setProductId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setProductId: null or numeric number is allowed' );
            }

            $this->product_id = $value;
        }
    }

?>