<?php
    /**
     *  Title: CheckoutDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class CheckoutDomain
     */
    class CheckoutDomain 
        extends Domain
            implements CheckoutInteraction
    {
        /**
         *
         */
        public const class_name = "CheckoutDomain";


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
         * Retrieves an overview of the users basket. and include the product
         */
        public final function overviewOfBasket(): ?array
        {
            $retVal = array();

            $factory = $this->getProductFactory();

            $basket = BasketSessionSingleton::getBasket();

            if( is_null( $basket ) )
            {
                return null;
            }

            foreach ( $basket->getEntries() as $entry )
            {
                if( $entry instanceof BasketEntry )
                {
                    $model = $factory->createModel();
                    $model->setIdentity($entry->getProductIdentity());

                    $factory->readModel( $model );

                    $index = array( 'model'=>$model, 
                                    'entry'=>$entry );

                    array_push($retVal, $index);
                }
            }

            return $retVal;
        }


        /**
         * @return array|null
         * @throws Exception
         */
        public final function purchase(): ?int
        {
            $retVal = null;

            $basket = BasketSessionSingleton::getBasket();

            $invoiceFactory = $this->getProductInvoiceFactory();
            $modelInvoice = $invoiceFactory->createModel();

            $infoFactory = $this->getProfileInformationFactory();

            $infoModel = $infoFactory->createModel();
            $infoModel->setProfileId( SessionUserProfile::getSessionUserProfileIdentity() );

            $infoFactory->readModel($infoModel );

            $modelInvoice->setMailId( 0 );
            $modelInvoice->setOwnerNameId( 0 );
            $modelInvoice->setAddressId( 0 );

            $modelInvoice->setTotalPrice( 0.0 );
            $modelInvoice->setProfileId( $infoModel->getProfileId() );

            $invoiceFactory->create($modelInvoice );

            $retVal = $modelInvoice->getIdentity();

            $broughtFactory = $this->getBroughtProductFactory();

            foreach ( $basket->getEntries() as $entry )
            {
                if( $entry instanceof BasketEntry )
                {
                    $product_id = $entry->getProductIdentity();
                    $quantity   = $entry->getProductQuantity();

                    $broughtModel = $broughtFactory->createModel();

                    $broughtModel->setPrice( 0.0 );
                    $broughtModel->setNumberOfProducts( $quantity );

                    $broughtModel->setInvoiceId( $modelInvoice->getIdentity() );
                    $broughtModel->setProductId( $product_id );

                    $broughtFactory->create( $broughtModel );
                }
            }

            return $retVal;
        }


        // Accessor
        /**
         * @return ProductEntityFactory|null
         * @throws Exception
         */
        protected final function getProductEntityFactory(): ?ProductEntityFactory
        {
            return GroupProduct::getProductEntityFactory();
        }


        /**
         * @return ProductInvoiceFactory|null
         * @throws Exception
         */
        protected final function getProductInvoiceFactory(): ?ProductInvoiceFactory
        {
            return GroupProduct::getProductInvoiceFactory();
        }


        /**
         * @return ProfileInformationFactory|null
         * @throws Exception
         */
        protected final function getProfileInformationFactory(): ?ProfileInformationFactory
        {
            return GroupAuthentication::getProfileInformationFactory();
        }


        /**
         * @return BroughtFactory|null
         * @throws Exception
         */
        protected final function getBroughtProductFactory(): ?BroughtFactory
        {
            return GroupProduct::getBroughtProductFactory();
        }


        /**
         * @return PersonAddressFactory|null
         * @throws Exception
         */
        protected final function getPersonAddressFactory(): ?PersonAddressFactory
        {
            return GroupAuthentication::getPersonAddressFactory();
        }


        /**
         * @return PersonEmailFactory|null
         * @throws Exception
         */
        protected final function getPersonEmailFactory(): ?PersonEmailFactory
        {
            return GroupAuthentication::getPersonEmailFactory();
        }


        /**
         * @return PersonNameFactory|null
         * @throws Exception
         */
        protected final function getPersonNameFactory(): ?PersonNameFactory
        {
            return GroupAuthentication::getPersonNameFactory();
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
         * @return ProfileFactory|null
         * @throws Exception
         */
        protected final function getProfileFactory(): ?ProfileFactory
        {
            return GroupAuthentication::getProfileFactory();
        }
    }

?>