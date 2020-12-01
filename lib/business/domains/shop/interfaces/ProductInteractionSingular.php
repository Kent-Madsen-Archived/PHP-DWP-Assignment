<?php

    /**
     * Interface ProductInteractionSingular
     */
    interface ProductInteractionSingular
    {
        /**
         * @param int $id
         * @return ProductModel|null
         */
        public function readSingularProduct( int $id ): ?ProductModel;


        /**
         * @param array $values
         * @return ProductModel|null
         */
        public function createSingularProduct( array $values ): ?ProductModel;


        /**
         * @param array $values
         * @return ProductModel|null
         */
        public function updateSingularProduct( array $values ): ?ProductModel;


        /**
         * @param array $values
         * @return ProductModel|null
         */
        public function deleteSingularProduct( array $values ): ?ProductModel;
    }
?>