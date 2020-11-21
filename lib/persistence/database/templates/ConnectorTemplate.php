<?php
    /**
     *  Title: ConnectorTemplate
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
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