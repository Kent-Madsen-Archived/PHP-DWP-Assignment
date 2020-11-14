<?php 

    class ProductInvoiceModel 
        extends DatabaseModel
        implements ProductInvoiceView,
                   ProductInvoiceController
    {
        // Constructors
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        // Variables
        private $identity = null;

        private $total_price        = null;
        private $invoice_registered = null;

        /**
         * 
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ProductInvoiceFactory )
            {
                return true;
            }

            return false;
        }

        // Accessors
            // getters
        /**
         * 
         */
        final public function getIdentity()
        {
            return $this->identity;
        }

        /**
         * 
         */
        final public function getTotalPrice()
        {
            return $this->total_price;
        }

        /**
         *
         */
        final public function getRegistered()
        {
            return $this->invoice_registered;
        }

            // Setters
        /**
         * 
         */
        public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ProductInvoiceModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }

        /**
         * 
         */
        final public function setRegistered( $var )
        {
            $this->invoice_registered = $var;
        }

        /**
         * 
         */
        final public function setTotalPrice( $var )
        {
            $this->total_price = $var;
        }

    }

?>