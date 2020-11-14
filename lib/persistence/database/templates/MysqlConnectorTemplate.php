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
    {
        /**
         * @return mixed
         */
        public function connect();

        /**
         * @return mixed
         */
        public function disconnect();

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