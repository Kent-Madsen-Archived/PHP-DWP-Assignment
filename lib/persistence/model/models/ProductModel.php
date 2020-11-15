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

            if( is_null( $this->identity ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return boolval( $retVal );
        }


        /**
         * @return mixed|null
         */
        final public function viewDescription()
        {
            // TODO: Implement viewDescription() method.
            return null;
        }


        /**
         * @return mixed|null
         */
        final public function viewPrice()
        {
            // TODO: Implement viewPrice() method.
            return null;
        }


        /**
         * @return mixed|null
         */
        final public function viewTitle()
        {
            // TODO: Implement viewTitle() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerTitle( $var )
        {
            // TODO: Implement controllerTitle() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerPrice( $var )
        {
            // TODO: Implement controllerPrice() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerDescription( $var )
        {
            // TODO: Implement controllerDescription() method.
            return null;
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
            $retval = false;

            if( $factory instanceof ProductFactory )
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
         * @return string|null
         */
        final public function getDescription()
        {
            if( is_null( $this->description ) )
            {
                return null;
            }

            return strval( $this->description );
        }


        /**
         * @return |null
         */
        final public function getPrice()
        {
            if( is_null( $this->price ) )
            {
                return null;
            }

            return doubleval( $this->price );
        }


        /**
         * @return |null
         */
        final public function getTitle()
        {
            if( is_null( $this->title ) )
            {
                return null;
            }

            return strval( $this->title );
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