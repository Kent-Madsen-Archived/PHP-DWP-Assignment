<?php 

    /**
     * 
     */
    class InvoiceModel 
        extends DatabaseModel 
            implements InvoiceView, 
                       InvoiceController
    {
        /**
         * 
         */
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }


    }


?>