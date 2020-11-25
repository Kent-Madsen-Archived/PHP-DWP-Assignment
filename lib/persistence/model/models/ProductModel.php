<?php

    /**
     * Class ProductModel
     */
    class ProductModel 
        extends DatabaseModel
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


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return boolval( $retVal );
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