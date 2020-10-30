<?php 
    /**
     * 
     */
    interface ConnectorTemplate
    {
        /**
         * 
         */
        public function connect();
        
        /**
         * 
         */
        public function disconnect();

        /**
         * 
         */
        public function ping();
    }
?>