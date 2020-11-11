<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    class BroughtFactory
        extends Factory
    {
        /**
         * 
         */
        function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }

        public function get()
        {
            
        }

        public function create( $model )
        {
            
        }

        public function update( $model )
        {

        }

        public function delete( $model )
        {

        }


    }

?>