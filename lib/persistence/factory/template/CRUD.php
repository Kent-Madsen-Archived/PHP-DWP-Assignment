<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    interface CRUD
    {
        /**
         * 
         */
        public function create( $model );

        /**
         * 
         */
        public function read();
        public function read_model( $model );

        /**
         * 
         */
        public function delete( $model );


        /**
         * 
         */
        public function update( $model );
    }
?>