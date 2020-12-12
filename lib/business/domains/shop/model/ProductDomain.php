<?php

    class ProductDomain
        extends Domain
            implements ProductInteraction,
                       ProductInteractionSingular,
                       ProductDomainPagination
    {
        //
        /**
         *
         */
        public const class_name = "ProductDomain";

        /**
         * CheckoutDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setName(self::class_name );
            $this->setInformation( null );
        }


        /**
         * @return array|null
         * @throws Exception
         */
        public final function retrieveProducts(): ?array
        {
            $retVal = null;

            $factory = $this->getProductFactory();
            $arr = $factory->read();

            $retVal = $arr;

            return $retVal;
        }


        /**
         * @param array $values
         * @return mixed|void
         */
        public final function createProducts( array $values ): ?array
        {
            $retVal = null;

            return $retVal;
        }


        /**
         * @param array $values
         * @return mixed|void
         */
        public final function deleteProducts( array $values ): ?array
        {
            $retVal = null;

            return $retVal;
        }


        /**
         * @param array $filter
         * @return mixed|void
         */
        public final function retrieveProductsWithFilter( array $filter ): ?array
        {
            $retVal = null;

            return $retVal;
        }


        /**
         * @param array $values
         * @return mixed|void
         */
        public final function updateProducts( array $values ): ?array
        {
            $retVal = null;

            return $retVal;
        }


        /**
         * @param int $id
         * @return ProductModel|null
         * @throws Exception
         */
        public final function readSingularProduct( int $id ): ?ProductModel
        {
            $retVal = null;

            $factory = $this->getProductFactory();

            $model = $factory->createModel();

            $model->setIdentity( $id );
            $factory->readModel($model );

            $retVal = $model;

            return $retVal;
        }

        public final function createAssociatedCategory( string $key, string $value ): ?AssociatedCategoryModel
        {
            $assoccatfac = GroupProduct::getProductAssociatedCategoryFactory();
            $product_cat_fac = GroupProduct::getProductCategoryFactory();
            $product_attr_fac = GroupProduct::getProductAttributeFactory();



            return null;
        }


        /**
         * @param array $values
         * @return mixed|void
         */
        public final function createSingularProduct( array $values ): ?ProductModel
        {
            $retVal = null;

            return $retVal;
        }


        /**
         * @param array $values
         * @return mixed|void
         */
        public final function deleteSingularProduct( array $values ): ?ProductModel
        {
            $retVal = null;

            return $retVal;
        }


        /**
         * @param array $values
         * @return mixed|void
         */
        public final function updateSingularProduct( array $values ): ?ProductModel
        {
            $retVal = null;

            return $retVal;
        }


        /**
         * @param int $limit_var
         * @throws Exception
         */
        public final function setLimit( int $limit_var ): void
        {
            $factory = $this->getProductFactory();
            $factory->setLimitValue( $limit_var );
        }


        /**
         * @param int $pagination_index
         * @throws Exception
         */
        public final function goToPagination( int $pagination_index ): void
        {
            $factory = $this->getProductFactory();
            $factory->setPaginationIndexValue( $pagination_index );
        }


        /**
         *
         */
        public final function nextPagination(): void
        {
            $factory = $this->getProductFactory();
            $current = $factory->getPaginationIndexCounter();
            $current->increment();
        }


        /**
         * @throws Exception
         */
        public final function previousPagination(): void
        {
            $factory = $this->getProductFactory();
            $current = $factory->getPaginationIndexCounter();
            $current->decrement();
        }


        /**
         * @param int $pagination
         * @param int $limit
         * @return array|null
         * @throws Exception
         */
        public final function retrieveProductsAt( int $pagination, int $limit ): ?array
        {
            $factory = $this->getProductFactory();

            $factory->setPaginationIndexValue( $pagination );
            $factory->setLimitValue( $limit );

            return $factory->read();
        }


        /**
         * @return array|null
         */
        public final function retrieveProductsAtCurrentPagination(): ?array
        {
            // TODO: Implement retrieveProductsAtCurrentPagination() method.
            return null;
        }


        //

        /**
         * @return ProductFactory|null
         * @throws Exception
         */
        public final function getProductFactory(): ?ProductFactory
        {
            return GroupProduct::getProductFactory();
        }


        /**
         * @return ProductEntityFactory|null
         * @throws Exception
         */
        public final function getProductEntityFactory(): ?ProductEntityFactory
        {
            return GroupProduct::getProductEntityFactory();
        }


        /**
         * @return AssociatedCategoryFactory|null
         * @throws Exception
         */
        public final function getProductAssociatedCategoryFactory(): ?AssociatedCategoryFactory
        {
            return GroupProduct::getProductAssociatedCategoryFactory();
        }


        /**
         * @return ProductAttributeFactory|null
         * @throws Exception
         */
        public final function getProductAttributeFactory(): ?ProductAttributeFactory
        {
            return GroupProduct::getProductAttributeFactory();
        }


        /**
         * @return ProductCategoryFactory|null
         * @throws Exception
         */
        public final function getProductCategoryFactory(): ?ProductCategoryFactory
        {
            return GroupProduct::getProductCategoryFactory();
        }


        /**
         * @return ProductUsedImageFactory|null
         * @throws Exception
         */
        public final function getProductUsedImagesFactory(): ?ProductUsedImageFactory
        {
            return GroupProduct::getProductUsedImagesFactory();
        }

    }

?>