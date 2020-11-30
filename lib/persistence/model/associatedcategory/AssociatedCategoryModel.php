<?php

    /**
     * Class AssociatedCategoryModel
     */
    class AssociatedCategoryModel
        extends DatabaseModelEntity
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
        private $product_id           = null;

        private $product_attribute_id = null;
        private $product_category_id  = null;


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
        final public function getProductAttributeId()
        {
            if( is_null( $this->product_attribute_id ) )
            {
                return null;
            }

            return intval( $this->product_attribute_id, BASE_10 );
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

            return intval( $this->product_category_id, BASE_10 );
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

            return intval( $this->product_id, BASE_10 );
        }


            // Setters
        /**
         * @param $var
         * @return int|null
         * @throws Exception
         */
        final public function setProductAttributeId( $var ): ?int
        {
            if( is_null( $var ) )
            {
                $this->product_attribute_id = null;
                return $this->product_attribute_id;
            }

            if( !is_int( $var ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setProductAttributeId: null or numeric number is allowed' );
            }
        
            $this->product_attribute_id = intval( $var, BASE_10 );
            return $this->product_attribute_id;
        }


        /**
         * @param $var
         * @return int|null
         * @throws Exception
         */
        final public function setProductCategoryId( $var ): ?int
        {
            if( is_null( $var ) )
            {
                $this->product_category_id = null;
                return $this->product_category_id;
            }

            if( !is_int( $var ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setProductCategoryId: null or numeric number is allowed' );
            }

            $this->product_category_id = intval( $var, BASE_10 );
            return $this->product_category_id;
        }


        /**
         * @param $var
         * @return int|null
         * @throws Exception
         */
        final public function setProductId( $var ): ?int
        {
            if( is_null( $var ) )
            {
                $this->product_id = null;
                return $this->product_id;
            }

            if( !is_int( $var ) )
            {
                throw new Exception( 'AssociatedCategoryModel - setProductId: null or numeric number is allowed' );
            }

            $this->product_id = intval( $var, BASE_10 );
            return $this->product_id;
        }
    }

?>