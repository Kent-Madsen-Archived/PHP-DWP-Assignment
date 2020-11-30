<?php

    /**
     * Class BroughtProductModel
     */
    class BroughtProductModelEntity
        extends DatabaseModelEntity
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


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return $retVal;
        }


        // Variables
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
            if( $factory instanceof BroughtBaseFactoryTemplate )
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
        final public function getProductId(): ?int
        {
            if( is_null( $this->product_id ) )
            {
                return null;
            }

            return intval( $this->product_id, BASE_10 );
        }


        /**
         * @return float|null
         */
        final public function getPrice(): ?float
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
        final public function getNumberOfProducts(): ?int
        {
            if( is_null( $this->number_of_products ) )
            {
                return null;
            }

            return intval( $this->number_of_products, BASE_10 );
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
        final public function getInvoiceId(): ?int
        {
            if( is_null( $this->invoice_id ) )
            {
                return null;
            }

            return intval( $this->invoice_id, BASE_10 );
        }


            // Setters
        /**
         * @param $var
         * @return int|null
         * @throws Exception
         */
        final public function setNumberOfProducts( $var ): ?int
        {
            if( is_null( $var ) )
            {
                $this->number_of_products = null;
                return $this->number_of_products;
            }

            if( !is_int( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setNumberOfProducts: null or numeric number is allowed' );
            }

            $this->number_of_products = intval( $var, BASE_10 );
            return $this->number_of_products;
        }


        /**
         * @param $var
         * @return int|null
         * @throws Exception
         */
        final public function setInvoiceId( $var ): ?int
        {
            if( is_null( $var ) )
            {
                $this->invoice_id = null;
                return $this->invoice_id;
            }

            if( !is_int( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setInvoiceId: null or numeric number is allowed' );
            }

            $this->invoice_id = intval( $var, BASE_10 );
            return $this->invoice_id;
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
                throw new Exception( 'BroughtProductModel - setProductId: null or numeric number is allowed' );
            }

            $this->product_id = intval( $var, BASE_10 );
            return $this->product_id;
        }


        /**
         * @param $var
         * @return float|null
         * @throws Exception
         */
        final public function setPrice( $var ): ?float
        {
            if( is_null( $var ) )
            {
                $this->price = null;
                return $this->price;
            }

            if( !is_double( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setPrice: null or numeric number is allowed' );
            }

            $this->price = doubleval( $var );
            return $this->price;
        }

    }

?>