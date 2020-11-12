<?php 

    class ProductInvoiceModel 
        extends DatabaseModel
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

        // Accessors
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

        public function getTotalPrice()
        {
            return $this->total_price;
        }

        public function setTotalPrice( $var )
        {
            $this->total_price = $var;
        }

        public function getRegistered()
        {
            return $this->invoice_registered;
        }

        public function setRegistered( $var )
        {
            $this->invoice_registered = $var;
        }

    }

?>