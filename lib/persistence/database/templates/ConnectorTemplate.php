<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ConnectorTemplate
     */
    interface ConnectorTemplate
    {
        /**
         * @return mixed
         */
        public function connect();

        /**
         * @return mixed
         */
        public function disconnect();

    }
?>