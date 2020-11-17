<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface CRUD
     */
    interface FactoryCRUD
    {
        /**
         * @param $model
         * @return bool|null
         */
        public function create( &$model ): bool;


        /**
         * @return mixed
         */
        public function read();


        /**
         * @param $model
         * @return mixed
         */
        public function read_model( &$model );



        /**
         * @param $model
         * @return bool|null
         */
        public function delete( &$model ): bool;


        /**
         * @param $model
         * @return mixed
         */
        public function update( &$model ):bool;
    }
?>