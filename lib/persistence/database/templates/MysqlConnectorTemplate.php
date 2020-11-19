<?php
    /**
     *  title:
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
        public function undoState();


        /**
         * @return mixed
         */
        public function finish();


        /**
         * @return mixed
         */
        public function finishCommitAndRetrieveInsertId($stmt );


        /**
         * @return mixed
         */
        public function is_open();
    }
?>