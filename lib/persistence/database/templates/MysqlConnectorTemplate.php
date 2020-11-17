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
        public function undo_state();


        /**
         * @return mixed
         */
        public function finish();


        /**
         * @return mixed
         */
        public function finish_commit_and_retrieve_insert_id( $stmt );


        /**
         * @return mixed
         */
        public function is_open();
    }
?>