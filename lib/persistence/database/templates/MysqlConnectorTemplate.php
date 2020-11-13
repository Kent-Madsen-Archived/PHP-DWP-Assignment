<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

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