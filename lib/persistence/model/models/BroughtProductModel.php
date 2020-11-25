<?php

    /**
     * Class BroughtProductModel
     */
    class BroughtProductModel 
        extends DatabaseModel
    {
        /**
         * BroughtProductModel constructor.
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

            return $retVal;
        }

        
        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerInvoice($var)
        {
            // TODO: Implement controllerInvoice() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerNumberOfProducts($var)
        {
            // TODO: Implement controllerNumberOfProducts() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerPrice($var)
        {
            // TODO: Implement controllerPrice() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerProduct($var)
        {
            // TODO: Implement controllerProduct() method.
            return null;
        }


        /**
         * @param $var
         * @return mixed|null
         */
        final public function controllerRegistered($var)
        {
            // TODO: Implement controllerRegistered() method.
            return null;
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
        private $identity   = null;

        private $invoice_id = null;
        private $product_id = null;
        
        private $number_of_products = null;
        private $price              = null;

        private $registered = null;


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof BroughtFactory )
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
        final public function getProductId()
        {
            if( is_null( $this->product_id ) )
            {
                return null;
            }

            return intval( $this->product_id, self::base() );
        }


        /**
         * @return float|null
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
         * @return int|null
         */
        final public function getNumberOfProducts()
        {
            if( is_null( $this->number_of_products ) )
            {
                return null;
            }

            return intval( $this->number_of_products );
        }


        /**
         * @return |null
         */
        final public function getRegistered()
        {
            return $this->registered;
        }


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
        final public function getInvoiceId()
        {
            if( is_null( $this->invoice_id ) )
            {
                return null;
            }

            return intval( $this->invoice_id, self::base() );
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
                throw new Exception( 'BroughtProductModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setNumberOfProducts( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !$this->genericNumberValidation( $value ) )
            {
                throw new Exception( 'BroughtProductModel - setNumberOfProducts: null or numeric number is allowed' );
            }

            $this->number_of_products = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setInvoiceId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'BroughtProductModel - setInvoiceId: null or numeric number is allowed' );
            }

            $this->invoice_id = $value;
        }


        /**
         * @param $var
         */
        final public function setRegistered( $var )
        {
            $this->registered = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setProductId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'BroughtProductModel - setProductId: null or numeric number is allowed' );
            }

            $this->product_id = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setPrice( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setPrice: null or numeric number is allowed' );
            }

            $this->price = $var;
        }

    }

?>