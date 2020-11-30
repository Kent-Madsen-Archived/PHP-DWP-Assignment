<?php
    /**
     *  Title: FactoryCRUD
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Interface
     *  Project: DWP-Assignment
     */

    /**
     * Interface CRUD
     *  * Create
     *  * Read
     *  * Update
     *  * Delete
     */
    interface FactoryCRUDInterface
    {
        /**
         * @param $model
         * @return bool|null
         */
        public function create( &$model ): bool;


        /**
         * @return array|null
         */
        public function read(): ?array;


        /**
         * @param $model
         * @return mixed
         */
        public function readModel( &$model );



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