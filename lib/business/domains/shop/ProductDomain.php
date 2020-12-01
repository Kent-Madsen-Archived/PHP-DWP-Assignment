<?php

    class ProductDomain
        extends Domain
            implements ProductInteraction, ProductInteractionSingular, ProductDomainPagination
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
            $this->setInformation( MySQLInformationSingleton::getSingleton() );

            $wrapper = new MySQLConnectorWrapper( $this->getInformation() );
            $this->setWrapper( $wrapper );

            // products
            $this->setProductFactory( new ProductFactory( $this->getWrapper() ) );

            // Type of attribute category
            $this->setProductAttributeFactory( new ProductAttributeFactory( $this->getWrapper() ) );

            // Type of category the product belongs too
            $this->setProductCategoryFactory( new ProductCategoryFactory( $this->getWrapper() ) );

            // associates a category with an attribute and category. an attribute can be color and the category is red
            $this->setProductAssociatedCategoryFactory( new AssociatedCategoryFactory( $this->getWrapper() ) );

            // Physical or digital coded ware. ie. a physical ware, or a digital code.
            $this->setProductEntityFactory( new ProductEntityFactory( $this->getWrapper() ) );

            // Add images to a product
            $this->setProductUsedImagesFactory( new ProductUsedImageFactory( $this->getWrapper() ) );
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
        public function readSingularProduct( int $id ): ?ProductModel
        {
            $retVal = null;

            $factory = $this->getProductFactory();

            $model = $factory->createModel();

            $model->setIdentity( $id );
            $factory->readModel($model );

            $retVal = $model;

            return $retVal;
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
         */
        public function setLimit( int $limit_var ): void
        {
            $factory = $this->getProductFactory();
            $factory->setLimitValue( $limit_var );
        }


        /**
         * @param int $pagination_index
         */
        public function goToPagination( int $pagination_index ): void
        {
            $factory = $this->getProductFactory();
            $factory->setPaginationIndexValue( $pagination_index );
        }


        /**
         *
         */
        public function nextPagination(): void
        {
            $factory = $this->getProductFactory();
            $current = $factory->getPaginationIndexCounter();
            $current->increment();
        }


        /**
         *
         */
        public function previousPagination(): void
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
        public function retrieveProductsAt( int $pagination, int $limit ): ?array
        {
            $factory = $this->getProductFactory();

            $factory->setPaginationIndexValue( $pagination );
            $factory->setLimitValue( $limit );

            return $factory->read();;
        }


        /**
         * @return array|null
         */
        public function retrieveProductsAtCurrentPagination(): ?array
        {
            // TODO: Implement retrieveProductsAtCurrentPagination() method.
        }


        //
        private $wrapper = null;

        private $product_factory        = null;
        private $product_entity_factory = null;

        private $product_associated_category_factory    = null;
        private $product_attribute_factory              = null;
        private $product_category_factory               = null;

        private $product_used_images_factory = null;



        // Accessor
        /**
         * @return null
         */
        public function getWrapper(): ?MySQLConnectorWrapper
        {
            return $this->wrapper;
        }

        /**
         * @return ProductFactory|null
         */
        public function getProductFactory(): ?ProductFactory
        {
            return $this->product_factory;
        }


        /**
         * @return ProductEntityFactory|null
         */
        public function getProductEntityFactory(): ?ProductEntityFactory
        {
            return $this->product_entity_factory;
        }


        /**
         * @return AssociatedCategoryFactory|null
         */
        public function getProductAssociatedCategoryFactory(): ?AssociatedCategoryFactory
        {
            return $this->product_associated_category_factory;
        }


        /**
         * @return ProductAttributeFactory|null
         */
        public function getProductAttributeFactory(): ?ProductAttributeFactory
        {
            return $this->product_attribute_factory;
        }

        /**
         * @return ProductCategoryFactory|null
         */
        public function getProductCategoryFactory(): ?ProductCategoryFactory
        {
            return $this->product_category_factory;
        }


        /**
         * @return ProductUsedImageFactory
         */
        public function getProductUsedImagesFactory(): ?ProductUsedImageFactory
        {
            return $this->product_used_images_factory;
        }


        /**
         * @param ProductFactory|null $product_factory
         */
        public function setProductFactory( ?ProductFactory $product_factory ): void
        {
            $this->product_factory = $product_factory;
        }


        /**
         * @param ProductEntityFactory|null $product_entity_factory
         */
        public function setProductEntityFactory( ?ProductEntityFactory $product_entity_factory ): void
        {
            $this->product_entity_factory = $product_entity_factory;
        }


        /**
         * @param AssociatedCategoryFactory|null $product_associated_category_factory
         */
        public function setProductAssociatedCategoryFactory( ?AssociatedCategoryFactory $product_associated_category_factory): void
        {
            $this->product_associated_category_factory = $product_associated_category_factory;
        }


        /**
         * @param MySQLConnectorWrapper|null $wrapper
         */
        public function setWrapper( ?MySQLConnectorWrapper $wrapper ): void
        {
            $this->wrapper = $wrapper;
        }


        /**
         * @param ProductAttributeFactory|null $product_attribute_factory
         */
        public function setProductAttributeFactory( ?ProductAttributeFactory $product_attribute_factory ): void
        {
            $this->product_attribute_factory = $product_attribute_factory;
        }


        /**
         * @param ProductCategoryFactory|null $product_category_factory
         */
        public function setProductCategoryFactory( ?ProductCategoryFactory $product_category_factory ): void
        {
            $this->product_category_factory = $product_category_factory;
        }


        /**
         * @param ProductUsedImageFactory|null $product_used_images_factory
         */
        public function setProductUsedImagesFactory( ?ProductUsedImageFactory $product_used_images_factory ): void
        {
            $this->product_used_images_factory = $product_used_images_factory;
        }
    }

?>