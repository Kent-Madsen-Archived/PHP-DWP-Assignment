<?php 

    class BroughtProductModel 
        extends DatabaseModel
        implements BroughtProductController,
                   BroughtProductView
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

        /**
         * 
         */
        protected function validateFactory( $factory )
        {
            if( $factory instanceof BroughtFactory )
            {
                return true;
            }

            return false;
        }

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
        public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $var;
        }

        /**
         * 
         */
        public function setNumberOfProducts( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setNumberOfProducts: null or numeric number is allowed' );
            }

            $this->identity = $number_of_products;
        }


        /**
         * 
         */
        public function setInvoiceId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setInvoiceId: null or numeric number is allowed' );
            }

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
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setProductId: null or numeric number is allowed' );
            }

            $this->product_id = $var;
        }


        /**
         * 
         */
        public function setPrice( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'BroughtProductModel - setPrice: null or numeric number is allowed' );
            }

            $this->price = $var;
        }

    }

?>