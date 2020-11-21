<?php

    /**
     * Class AssociatedCategoryModel
     */
    class AssociatedCategoryModel 
        extends DatabaseModel
            implements AssociatedCategoryController
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

        private $product_id           = null;

        private $product_attribute_id = null;
        private $product_category_id  = null;


        // implement interfaces
        /**
         * @return int|mixed|null
         */
        final public function viewIdentity()
        {
            if( $this->viewIsIdentityNull() )
            {
                return null;
            }

            return $this->getIdentity();
        }


        /**
         * @return bool|mixed
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->identity ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }

        
        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerAttribute( $var )
        {
            // TODO: Implement controllerAttribute() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerCategory( $var )
        {
            // TODO: Implement controllerCategory() method.
            return null;
        }

        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerProduct( $var )
        {
            // TODO: Implement controllerProduct() method.
            return null;
        }


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return boolval( $retVal );
        }


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            $retval = false;

            if( $factory instanceof AssociatedCategoryFactory )
            {
                $retval = true;
            }

            return boolval( $retval );
        }


        // Accessors
            // Getters
        /**
         * @return int|null
         */
        final public function getIdentity()
        {
            if( is_null( $this->identity ) )
            {
                return null;
            }

            return intval( $this->identity, self::base() );
        }


        /**
         * @return int|null
         */
        final public function getProductAttributeId()
        {
            if( is_null( $this->product_attribute_id ) )
            {
                return null;
            }

            return intval( $this->product_attribute_id, self::base() );
        }


        /**
         * @return int|null
         */
        final public function getProductCategoryId()
        {
            if( is_null( $this->product_category_id ) )
            {
                return null;
            }

            return intval( $this->product_category_id, self::base() );
        }


        /**
         * @return int|null
         */
        final public function getProductId()
        {
            if( is_null( $this->product_id ) )
            {
                return null;
            }

            return intval( $this->product_id, self::base() );
        }


            // Setters
        /**
         * @param $var
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setProductAttributeId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT );

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
            $value = filter_var( $var, FILTER_VALIDATE_INT );

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
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setProductId: null or numeric number is allowed' );
            }

            $this->product_id = $value;
        }
    }

?>