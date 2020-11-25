<?php

    /**
     * Class ProductCategoryModel
     */
    class ProductCategoryModel 
        extends DatabaseModel
    {
        // Constructors
        /**
         * ProductCategoryModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }


        public function requiredFieldsValidated()
        {
            // TODO: Implement requiredFieldsValidated() method.
        }


        // Variables
        private $identity = null;
        private $content  = null;


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
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
         * @return string|null
         */
        final public function getContent()
        {
            if( is_null( $this->content ) )
            {
                return $this->content;
            }

            return strval( $this->content );
        }


            // setters
        /**
         * @param $var
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ProductCategoryModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $value;
        }


        /**
         * @param $var
         */
        final public function setContent( $var )
        {
            $this->content = $var;
        }

    }

?>