<?php

    abstract class GroupProduct
    {
        private static $mysql_wrapper = null;

        private static $product_factory = null;
        private static $product_entity_factory = null;

        private static $brought_product_factory = null;
        private static $product_invoice_factory = null;

        private static $product_associated_category_factory    = null;
        private static $product_attribute_factory              = null;
        private static $product_category_factory               = null;

        private static $product_used_images_factory = null;
        private static $product_timed_discount_factory = null;


        /**
         * @return MySQLConnectorWrapper
         * @throws Exception
         */
        public static final function getMysqlWrapper(): MySQLConnectorWrapper
        {
            if( is_null( self::$mysql_wrapper ) )
            {
                self::setMysqlWrapper(
                    new MySQLConnectorWrapper(
                        MySQLInformationSingleton::getSingleton() ) );
            }

            return self::$mysql_wrapper;
        }

        /**
         * @return ProductInvoiceFactory|null
         * @throws Exception
         */
        public static final function getProductInvoiceFactory(): ?ProductInvoiceFactory
        {
            if( is_null( self::$product_invoice_factory ) )
            {
                self::setProductInvoiceFactory(
                    new ProductInvoiceFactory(
                        self::getMysqlWrapper()
                    )
                );
            }

            return self::$product_invoice_factory;
        }


        /**
         * @return ProductCategoryFactory|null
         * @throws Exception
         */
        public static final function getProductCategoryFactory(): ?ProductCategoryFactory
        {
            if( is_null( self::$product_category_factory ) )
            {
                self::setProductCategoryFactory(
                    new ProductCategoryFactory(
                        self::getMysqlWrapper()
                    )
                );
            }

            return self::$product_category_factory;
        }


        /**
         * @return ProductAttributeFactory|null
         * @throws Exception
         */
        public static final function getProductAttributeFactory(): ?ProductAttributeFactory
        {
            if( is_null( self::$product_attribute_factory ) )
            {
                self::setProductAttributeFactory(
                    new ProductAttributeFactory(
                        self::getMysqlWrapper()
                    )
                );
            }

            return self::$product_attribute_factory;
        }


        /**
         * @return AssociatedCategoryFactory|null
         * @throws Exception
         */
        public static final function getProductAssociatedCategoryFactory(): ?AssociatedCategoryFactory
        {
            if( is_null( self::$product_associated_category_factory ) )
            {
                self::setProductAssociatedCategoryFactory(
                    new AssociatedCategoryFactory(
                        self::getMysqlWrapper() ) );
            }

            return self::$product_associated_category_factory;
        }


        /**
         * @return ProductEntityFactory|null
         * @throws Exception
         */
        public static final function getProductEntityFactory(): ?ProductEntityFactory
        {
            if( is_null( self::$product_entity_factory ) )
            {
                self::setProductEntityFactory(
                    new ProductEntityFactory(
                        self::getMysqlWrapper()
                    )
                );
            }

            return self::$product_entity_factory;
        }


        /**
         * @return ProductFactory|null
         * @throws Exception
         */
        public static final function getProductFactory(): ?ProductFactory
        {
            if( is_null( self::$product_factory ) )
            {
                self::setProductFactory(
                    new ProductFactory(
                        self::getMysqlWrapper()
                    )
                );
            }

            return self::$product_factory;
        }


        /**
         * @return BroughtFactory|null
         * @throws Exception
         */
        public static final function getBroughtProductFactory(): ?BroughtFactory
        {
            if( is_null( self::$brought_product_factory ) )
            {
                self::setBroughtProductFactory(
                    new BroughtFactory(
                        self::getMysqlWrapper()
                    )
                );
            }

            return self::$brought_product_factory;
        }


        /**
         * @return ProductUsedImageFactory|null
         * @throws Exception
         */
        public static final function getProductUsedImagesFactory(): ?ProductUsedImageFactory
        {
            if( is_null( self::$product_used_images_factory ) )
            {
                self::setProductUsedImagesFactory(
                    new ProductUsedImageFactory(
                        self::getMysqlWrapper() ) );
            }

            return self::$product_used_images_factory;
        }


        /**
         * @return null
         * @throws Exception
         */
        public static function getProductTimedDiscountFactory()
        {
            if( is_null( self::$product_timed_discount_factory ) )
            {
                self::setProductTimedDiscountFactory(
                    new TimedDiscountFactory(
                        self::getMysqlWrapper() ) );
            }

            return self::$product_timed_discount_factory;
        }


        /**
         * @param ProductCategoryFactory|null $product_category_factory
         */
        public static final function setProductCategoryFactory( ?ProductCategoryFactory $product_category_factory ): void
        {
            self::$product_category_factory = $product_category_factory;
        }


        /**
         * @param ProductAttributeFactory|null $product_attribute_factory
         */
        public static final function setProductAttributeFactory( ?ProductAttributeFactory $product_attribute_factory ): void
        {
            self::$product_attribute_factory = $product_attribute_factory;
        }


        /**
         * @param AssociatedCategoryFactory|null $product_associated_category_factory
         */
        public static final function setProductAssociatedCategoryFactory( ?AssociatedCategoryFactory $product_associated_category_factory ): void
        {
            self::$product_associated_category_factory = $product_associated_category_factory;
        }


        /**
         * @param ProductEntityFactory|null $product_entity_factory
         */
        public static final function setProductEntityFactory( ?ProductEntityFactory $product_entity_factory ): void
        {
            self::$product_entity_factory = $product_entity_factory;
        }


        /**
         * @param ProductFactory|null $product_factory
         */
        public static final function setProductFactory( ?ProductFactory $product_factory ): void
        {
            self::$product_factory = $product_factory;
        }


        /**
         * @param ProductInvoiceFactory|null $product_invoice_factory
         */
        public static final function setProductInvoiceFactory( ?ProductInvoiceFactory $product_invoice_factory ): void
        {
            self::$product_invoice_factory = $product_invoice_factory;
        }


        /**
         * @param BroughtFactory|null $brought_product_factory
         */
        public static final function setBroughtProductFactory( ?BroughtFactory $brought_product_factory ): void
        {
            self::$brought_product_factory = $brought_product_factory;
        }


        /**
         * @param ProductUsedImageFactory|null $product_used_images_factory
         */
        public static final function setProductUsedImagesFactory( ?ProductUsedImageFactory $product_used_images_factory ): void
        {
            self::$product_used_images_factory = $product_used_images_factory;
        }


        /**
         * @param TimedDiscountFactory|null $product_timed_discount_factory
         */
        public static final function setProductTimedDiscountFactory( ?TimedDiscountFactory $product_timed_discount_factory ): void
        {
            self::$product_timed_discount_factory = $product_timed_discount_factory;
        }


        /**
         * @param $mysql_wrapper
         */
        public static final function setMysqlWrapper( $mysql_wrapper ): void
        {
            self::$mysql_wrapper = $mysql_wrapper;
        }
    }

?>