<?php

    /**
     * Class ProductCategoryModel
     */
    class ProductCategoryModelEntity
        extends DatabaseModelEntity
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
        private $content  = null;


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ProductCategoryBaseFactoryTemplate )
            {
                return true;
            }

            return false;
        }

        
        // accessors
            // getters
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
         */
        final public function setContent( $var )
        {
            $this->content = $var;
        }

    }

?>