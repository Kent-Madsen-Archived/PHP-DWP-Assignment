<?php 

    class BroughtProductModel 
        extends DatabaseModel
    {
        function __construct( $factory )
        {
            $this->setFactory( $factory );   
        }

        // Variables
        private $identity = null;
        private $invoice_id = null;
        
        private $number_of_products = null;
        private $price = null;

        private $product_id = null;
        private $registered = null;

        // Accessors
        /**
         * 
         */
        public function setProductId( $var )
        {
            $this->product_id = $var;
        }


        /**
         * 
         */
        public function getProductId()
        {
            return $this->product_id;
        }
        

        /**
         * 
         */
        public function setPrice( $var )
        {
            $this->price = $var;
        }

        /**
         * 
         */
        public function getPrice()
        {
            return $this->price;
        }
        

        /**
         * 
         */
        public function getNumberOfProducts()
        {
            return $this->number_of_products;
        }


        /**
         * 
         */
        public function setNumberOfProducts( $var )
        {
            $this->identity = $number_of_products;
        }


        /**
         * 
         */
        public function setIdentity( $var )
        {
            $this->identity = $var;
        }


        /**
         * 
         */
        public function getIdentity()
        {
            return $this->identity;
        }
        

        /**
         * 
         */
        public function setInvoiceId( $var )
        {
            $this->invoice_id = $var;
        }


        /**
         * 
         */
        public function getInvoiceId()
        {
            return $this->invoice_id;
        }
        

        /**
         * 
         */
        public function setRegistered( $var )
        {
            $this->registered = $var;
        }


        /**
         * 
         */
        public function getRegistered()
        {
            return $this->registered;
        }

    }

?>