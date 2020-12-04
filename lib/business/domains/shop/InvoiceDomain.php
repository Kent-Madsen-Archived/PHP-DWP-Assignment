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

        }


        /**
         * @param int $prof_idx
         * @return array
         * @throws Exception
         */
        public final function retrieveInvoicesByProfileIdentity(int $prof_idx ): array
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


        // Accessor
        /**
         * @return ProductInvoiceFactory|null
         * @throws Exception
         */
        protected final function getProductInvoiceFactory(): ?ProductInvoiceFactory
        {
            return GroupProduct::getProductInvoiceFactory();
        }


        /**
         * @return ProductEntityFactory|null
         * @throws Exception
         */
        protected final function getProductEntityFactory(): ?ProductEntityFactory
        {
            return GroupProduct::getProductEntityFactory();
        }


        /**
         * @return ProfileFactory|null
         * @throws Exception
         */
        protected final function getProfileFactory(): ?ProfileFactory
        {
            return GroupAuthentication::getProfileFactory();
        }


        /**
         * @return ProductFactory|null
         * @throws Exception
         */
        protected final function getProductFactory(): ?ProductFactory
        {
            return GroupProduct::getProductFactory();
        }


        /**
         * @return BroughtFactory|null
         * @throws Exception
         */
        protected final function getBroughtFactory(): ?BroughtFactory
        {
            return GroupProduct::getBroughtProductFactory();
        }

    }

?>