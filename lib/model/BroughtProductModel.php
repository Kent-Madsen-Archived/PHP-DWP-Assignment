<?php 

    class BroughtProductModel 
        extends DatabaseModel
    {
        // Constructors
        function __construct( $factory )
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

        // Accessors
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
        public function getRegistered()
        {
            return $this->registered;
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
        public function getInvoiceId()
        {
            return $this->invoice_id;
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
        public function setInvoiceId( $var )
        {
            $this->invoice_id = $var;
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
        public function setProductId( $var )
        {
            $this->product_id = $var;
        }


        /**
         * 
         */
        public function setPrice( $var )
        {
            $this->price = $var;
        }

    }

?>