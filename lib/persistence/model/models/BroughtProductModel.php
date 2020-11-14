<?php

    /**
     * Class BroughtProductModel
     */
    class BroughtProductModel 
        extends DatabaseModel
        implements BroughtProductController,
                   BroughtProductView
    {
        // Constructors
        /**
         * BroughtProductModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );   
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
         * @return |null
         */
        final public function getProductId()
        {
            return $this->product_id;
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
        final public function getNumberOfProducts()
        {
            return $this->number_of_products;
        }

        /**
         * @return |null
         */
        final public function getRegistered()
        {
            return $this->registered;
        }

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
        final public function getInvoiceId()
        {

            return $this->invoice_id;
        }

            // Setters

        /**
         * @param $var
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $var;
        }

        /**
         * @param $var
         * @throws Exception
         */
        final public function setNumberOfProducts( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setNumberOfProducts: null or numeric number is allowed' );
            }

            $this->identity = $number_of_products;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setInvoiceId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setInvoiceId: null or numeric number is allowed' );
            }

            $this->invoice_id = $var;
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
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setProductId: null or numeric number is allowed' );
            }

            $this->product_id = $var;
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