<?php 

    class ProductInvoiceFactory
    {
        public function __construct( $mysql_connector )
        {
            
        }

        /**
         * 
         */
        final public function validateAsValidModel( $var )
        {
            if( $var instanceof ProductInvoiceModel )
            {
                return true;
            }

            return false;
        }
    }

?>