<?php
    /**
     *  Title: MysqlConnectorTemplate
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
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
        public function finishCommitAndRetrieveInsertId( $stmt );


        /**
         * @return mixed
         */
        public function is_open();
    }
?>