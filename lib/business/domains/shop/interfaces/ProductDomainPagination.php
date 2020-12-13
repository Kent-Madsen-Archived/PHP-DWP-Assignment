<?php

    interface ProductDomainPagination
    {
        public function setLimit(int $limit_var): void;
        public function goToPagination(int $pagination_index): void;

        public function retrieveProductsAt( int $pagination, int $limit ): ?array;

        public function retrieveProductsAtCurrentPagination(): ?array;

        public function nextPagination(): void;
        public function previousPagination(): void;

    }

?>