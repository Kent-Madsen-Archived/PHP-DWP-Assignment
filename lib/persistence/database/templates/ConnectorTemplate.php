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
        public function connect(): ?mysqli;


        /**
         * @return mixed
         */
        public function disconnect(): ?mysqli;

    }
?>