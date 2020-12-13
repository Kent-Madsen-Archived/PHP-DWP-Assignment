<?php

    /**
     * Class BroughtProductModel
     */
    class BroughtProductModel
        extends DatabaseModelEntity
    {
        /**
         * BroughtProductModel constructor.
         * @param BroughtFactory|null $factory
         * @throws Exception
         */
        public function __construct( ?BroughtFactory $factory )
        {
            $this->setFactory( $factory );   
        }


        /**
         * @return bool
         */
        final public function requiredFieldsValidated():bool
        {
            $retVal = false;

            $invoice_id_has_input = !is_null($this->invoice_id);
            $number_of_product_has_input = !is_null($this->number_of_products);
            $product_price_has_input = !is_null($this->price);
            $product_identity_has_input = !is_null($this->product_id);

            $retVal = ( $invoice_id_has_input && $number_of_product_has_input &&
                        $product_price_has_input && $product_identity_has_input );

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
        final public function getProductId(): ?int
        {
            return $this->product_id;
        }


        /**
         * @return float|null
         */
        public final function getPrice(): ?float
        {
            return $this->price;
        }


        /**
         * @return int|null
         */
        public final function getNumberOfProducts(): ?int
        {
            return $this->number_of_products;
        }


        /**
         * @return string|null
         */
        public final function getRegistered(): ?string
        {
            return $this->registered;
        }


        /**
         * @return int|null
         */
        public final function getInvoiceId(): ?int
        {
            return $this->invoice_id;
        }


            // Setters
        /**
         * @param int|null $var
         */
        public final function setNumberOfProducts( ?int $var ): void
        {
            $this->number_of_products = $var;
        }


        /**
         * @param int|null $var
         */
        public final function setInvoiceId( ?int $var ): void
        {
            $this->invoice_id = $var;
        }


        /**
         * @param string|null $var
         */
        public final function setRegistered( ?string $var ): void
        {
            $this->registered = $var;
        }


        /**
         * @param int|null $var
         */
        public final function setProductId( ?int $var ): void
        {
            $this->product_id = $var;
        }


        /**
         * @param float|null $var
         */
        public final function setPrice( ?float $var ): void
        {
            $this->price = $var;
        }

    }

?>