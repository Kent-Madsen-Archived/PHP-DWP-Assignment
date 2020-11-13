<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    interface CRUD
    {
        public function read();

        public function create( $model );
        public function delete( $model );

        public function update( $model );
    }
?>