<?php

    class InvoiceDomain
        extends Domain
    {
        /**
         *
         */
        public const class_name = "InvoiceDomain";

        /**
         * CheckoutDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setName(self::class_name );
            $this->setInformation( MySQLInformationSingleton::getSingleton() );

            $this->setProductFactory(new ProductFactory(new MySQLConnectorWrapper($this->getInformation())));
            $this->setProductEntityFactory(new ProductEntityFactory(new MySQLConnectorWrapper($this->getInformation())));

            $this->setProductInvoiceFactory(new ProductInvoiceFactory(new MySQLConnectorWrapper($this->getInformation())));

            $this->setProfileFactory(new ProfileFactory(new MySQLConnectorWrapper($this->getInformation())));
            $this->setBroughtFactory(new BroughtFactory(new MySQLConnectorWrapper($this->getInformation())));
        }


        /**
         * @param int $prof_idx
         * @return array
         * @throws Exception
         */
        public final function retrieveInvoicesBy( int $prof_idx ): array
        {
            $factory = $this->getProductInvoiceFactory();
            $factory->setFilter( array( ProductInvoiceFactory::filter_by_profile_id => $prof_idx ) );

            $arr = $factory->read();
            return $arr;
        }


        /**
         * @param int $invoice_idx
         * @return array
         * @throws Exception
         */
        public final function retrieveBroughtProductBy( int $invoice_idx ): array
        {
            $retVal = array();

            $factory = $this->getBroughtFactory();
            $factory->setFilter( array( BroughtFactory::filter_by_invoice_id => $invoice_idx ) );

            $retVal = $factory->read();
            return $retVal;
        }


        /**
         * @param int $idx
         * @return ProductModel
         * @throws Exception
         */
        public final function retrieveProductByIndex( int $idx ): ProductModel
        {
            $retVal = null;

            $factory = $this->getProductFactory();

            $model = $factory->createModel();
            $model->setIdentity( $idx );
            $factory->readModel($model);

            return $model;
        }



        // Variables
        private $product_factory = null;

        private $product_invoice_factory = null;
        private $product_entity_factory = null;
        private $brought_factory = null;

        private $profile_factory = null;

        // Accessor
        /**
         * @return ProductInvoiceFactory|null
         */
        public function getProductInvoiceFactory():?ProductInvoiceFactory
        {
            return $this->product_invoice_factory;
        }

        /**
         * @param ProductInvoiceFactory|null $product_invoice_factory
         */
        public function setProductInvoiceFactory( ?ProductInvoiceFactory $product_invoice_factory ): void
        {
            $this->product_invoice_factory = $product_invoice_factory;
        }

        /**
         * @return ProductEntityFactory|null
         */
        public final function getProductEntityFactory(): ?ProductEntityFactory
        {
            return $this->product_entity_factory;
        }


        /**
         * @return ProfileFactory|null
         */
        public final function getProfileFactory(): ?ProfileFactory
        {
            return $this->profile_factory;
        }


        /**
         * @return ProductFactory|null
         */
        public final function getProductFactory(): ?ProductFactory
        {
            return $this->product_factory;
        }


        /**
         * @return BroughtFactory|null
         */
        public final function getBroughtFactory(): ?BroughtFactory
        {
            return $this->brought_factory;
        }


        /**
         * @param ProfileFactory|null $profile_factory
         */
        public final function setProfileFactory( ?ProfileFactory $profile_factory ): void
        {
            $this->profile_factory = $profile_factory;
        }


        /**
         * @param ProductFactory|null $product_factory
         */
        public final function setProductFactory( ?ProductFactory $product_factory ): void
        {
            $this->product_factory = $product_factory;
        }


        /**
         * @param BroughtFactory|null $brought_factory
         */
        public final function setBroughtFactory( ?BroughtFactory $brought_factory ): void
        {
            $this->brought_factory = $brought_factory;
        }


        /**
         * @param ProductEntityFactory|null $product_entity_factory
         */
        public final function setProductEntityFactory( ?ProductEntityFactory $product_entity_factory ): void
        {
            $this->product_entity_factory = $product_entity_factory;
        }


    }

?>