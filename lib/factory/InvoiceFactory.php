<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


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

        public function create( $model )
        {
            
        }


    }

?>