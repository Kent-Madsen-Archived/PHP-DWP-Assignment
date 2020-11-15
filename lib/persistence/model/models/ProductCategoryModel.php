<?php

    /**
     * Class ProductCategoryModel
     */
    class ProductCategoryModel 
        extends DatabaseModel
        implements ProductCategoryController,
                   ProductCategoryView
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
         * @return |null
         */
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return |null
         */
        final public function getContent()
        {
            return $this->content;
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