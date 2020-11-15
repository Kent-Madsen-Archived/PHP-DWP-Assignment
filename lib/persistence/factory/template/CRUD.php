<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface CRUD
     */
    interface CRUD
    {
        /**
         * @param $model
         * @return mixed
         */
        public function create( $model );


        /**
         * @return mixed
         */
        public function read();


        /**
         * @param $model
         * @return mixed
         */
        public function read_model( $model );


        /**
         * @param $model
         * @return mixed
         */
        public function delete( $model );


        /**
         * @param $model
         * @return mixed
         */
        public function update( $model );
    }
?>