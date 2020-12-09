<?php

    /**
     * Class ProductCategoryModel
     */
    class ProductCategoryModel
        extends DatabaseModelEntity
    {
        // Constructors
        /**
         * ProductCategoryModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( ?ProductCategoryFactory $factory )
        {
            $this->setFactory( $factory );
        }


        /**
         * @return bool
         */
        public function requiredFieldsValidated(): bool
        {
            return $retVal = !is_null($this->content);
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
            if( $factory instanceof ProductCategoryFactory )
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