<?php 

    class BroughtProductModel 
        extends DatabaseModel
    {
        function __construct()
        {
            
        }

        private $identity = null;
        private $invoice_id = null;
        private $number_of_products = null;
        private $price = null;
        private $product_id = null;
        private $registered = null;

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

    }

?>