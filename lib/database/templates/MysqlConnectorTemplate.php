<?php 
    /**
     * 
     */
    interface MysqlConnectorTemplate
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
        public function undo_state();

        /**
         * 
         */
        public function finish();
    }
?>