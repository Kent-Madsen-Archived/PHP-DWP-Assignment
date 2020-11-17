<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductInvoiceView
     */
    class ProductInvoiceView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }

        public function validateModel( $model )
         {
             $retval = false;
 
             if( $model instanceof ProductInvoiceModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }

    }
?>