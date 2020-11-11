<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    interface CRUD
    {
        public function get();

        public function create( $model );
        public function delete( $model );

        public function update( $model );
    }
?>