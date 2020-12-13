<?php
    interface ProductInteraction
    {
        /**
         * @return mixed
         */
        public function retrieveProducts(): ?array;


        /**
         * @param array $filter
         * @return mixed
         */
        public function retrieveProductsWithFilter( array $filter ): ?array;


        /**
         * @param array $values
         * @return mixed
         */
        public function createProducts( array $values ): ?array;


        /**
         * @param array $values
         * @return mixed
         */
        public function updateProducts( array $values ): ?array;


        /**
         * @param array $values
         * @return mixed
         */
        public function deleteProducts( array $values ): ?array;
    }
?>