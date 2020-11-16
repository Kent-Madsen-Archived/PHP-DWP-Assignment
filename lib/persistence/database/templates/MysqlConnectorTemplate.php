<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface MysqlConnectorTemplate
     */
    interface MysqlConnectorTemplate
        extends ConnectorTemplate
    {
        /**
         * @return mixed
         */
        public function undo_state();

        /**
         * @return mixed
         */
        public function finish();
    }
?>