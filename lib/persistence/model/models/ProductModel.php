<?php

    /**
     * Class ProductModel
     */
    class ProductModel 
        extends DatabaseModel
            implements ProductView, 
                       ProductController
    {
        // constructors
        /**
         * ProductModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

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

            if( is_null( $this->identity ) == true )
            {
                $retVal = true;
            }

            return $retVal;
        }

        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return $retVal;
        }

        // Variables
        private $identity = null;

        private $title          = null;
        private $description    = null;
        private $price          = null;


        // implementation of factory classes

        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ProductFactory )
            {
                return true;
            }

            return false;
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
         * @return |null
         */
        final public function getDescription()
        {
            return $this->description;
        }


        /**
         * @return |null
         */
        final public function getPrice()
        {
            return $this->price;
        }


        /**
         * @return |null
         */
        final public function getTitle()
        {
            return $this->title;
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
                throw new Exception( 'ProductModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $value;
        }


        /**
         * @param $var
         */
        final public function setDescription( $var )
        {
            $this->description = $var;
        }


        /**
         * @param $var
         */
        final public function setPrice( $var )
        {
            $this->price = $var;
        }


        /**
         * @param $var
         */
        final public function setTitle( $var )
        {
            $this->title = $var;
        }

    }

?>