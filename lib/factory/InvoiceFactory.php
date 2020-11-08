<?php 

    /**
     * 
     */
    class InvoiceFactory 
        extends Factory
    {
        /**
         * 
         */
        function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }


    }

?>