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