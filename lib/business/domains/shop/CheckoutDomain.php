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

            $this->setProductFactory(
                new ProductFactory(
                    new MySQLConnectorWrapper( $this->getInformation() ) ) );

            $this->setProductEntityFactory(
                new ProductEntityFactory(
                    new MySQLConnectorWrapper( $this->getInformation() ) ) );

            $this->setBroughtProductFactory(
                new BroughtFactory(
                    new MySQLConnectorWrapper( $this->getInformation() ) ) );

            $this->setProductInvoiceFactory(
                new ProductInvoiceFactory(
                    new MySQLConnectorWrapper( $this->getInformation() ) ) );

            $this->setProfileFactory(
                new ProfileFactory(
                    new MySQLConnectorWrapper( $this->getInformation() ) ) );

            $this->setPersonNameFactory(
                new PersonNameFactory(
                    new MySQLConnectorWrapper( $this->getInformation() ) ) );

            $this->setPersonEmailFactory(
                new PersonEmailFactory(
                    new MySQLConnectorWrapper( $this->getInformation() ) ) );

            $this->setPersonAddressFactory(
                new PersonAddressFactory(
                    new MySQLConnectorWrapper( $this->getInformation() ) ) );

        }

        // Variables
        private $product_factory = null;
        private $product_entity_factory = null;

        private $brought_product_factory = null;
        private $product_invoice_factory = null;

        private $profile_factory = null;

        private $person_name_factory = null;
        private $person_email_factory = null;
        private $person_address_factory = null;


        /**
         * Retrieves an overview of the users basket. and include the product
         */
        public final function overviewOfBasket(): array
        {
            $retVal = array();

            $factory = $this->getProductFactory();

            if(!($factory instanceof ProductFactory))
            {

            }

            $basket = BasketSessionSingleton::getBasket();

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


        // Accessor
        /**
         * @return ProductEntityFactory|null
         */
        public final function getProductEntityFactory(): ?ProductEntityFactory
        {
            return $this->product_entity_factory;
        }


        /**
         * @return ProductInvoiceFactory|null
         */
        public final function getProductInvoiceFactory(): ?ProductInvoiceFactory
        {
            return $this->product_invoice_factory;
        }


        /**
         * @return BroughtFactory|null
         */
        public final function getBroughtProductFactory(): ?BroughtFactory
        {
            return $this->brought_product_factory;
        }


        /**
         * @return PersonAddressFactory|null
         */
        public final function getPersonAddressFactory(): ?PersonAddressFactory
        {
            return $this->person_address_factory;
        }


        /**
         * @return PersonEmailFactory|null
         */
        public final function getPersonEmailFactory(): ?PersonEmailFactory
        {
            return $this->person_email_factory;
        }


        /**
         * @return PersonNameFactory|null
         */
        public final function getPersonNameFactory(): ?PersonNameFactory
        {
            return $this->person_name_factory;
        }

        /**
         * @return ProductFactory|null
         */
        public final function getProductFactory(): ?ProductFactory
        {
            return $this->product_factory;
        }


        /**
         * @return ProfileFactory|null
         */
        public final function getProfileFactory(): ?ProfileFactory
        {
            return $this->profile_factory;
        }


        /**
         * @param ProductInvoiceFactory|null $product_invoice_factory
         */
        public final function setProductInvoiceFactory( ?ProductInvoiceFactory $product_invoice_factory ): void
        {
            $this->product_invoice_factory = $product_invoice_factory;
        }


        /**
         * @param ProductEntityFactory|null $product_entity_factory
         */
        public final function setProductEntityFactory( ?ProductEntityFactory $product_entity_factory ): void
        {
            $this->product_entity_factory = $product_entity_factory;
        }


        /**
         * @param BroughtFactory|null $brought_product_factory
         */
        public final function setBroughtProductFactory( ?BroughtFactory $brought_product_factory ): void
        {
            $this->brought_product_factory = $brought_product_factory;
        }


        /**
         * @param PersonAddressFactory|null $person_address_factory
         */
        public final function setPersonAddressFactory( ?PersonAddressFactory $person_address_factory ): void
        {
            $this->person_address_factory = $person_address_factory;
        }


        /**
         * @param PersonEmailFactory|null $person_email_factory
         */
        public final function setPersonEmailFactory( ?PersonEmailFactory $person_email_factory ): void
        {
            $this->person_email_factory = $person_email_factory;
        }


        /**
         * @param PersonNameFactory|null $person_name_factory
         */
        public final function setPersonNameFactory( ?PersonNameFactory $person_name_factory ): void
        {
            $this->person_name_factory = $person_name_factory;
        }


        /**
         * @param ProductFactory|null $product_factory
         */
        public final function setProductFactory( ?ProductFactory $product_factory ): void
        {
            $this->product_factory = $product_factory;
        }


        /**
         * @param ProfileFactory|null $profile_factory
         */
        public final function setProfileFactory( ?ProfileFactory $profile_factory ): void
        {
            $this->profile_factory = $profile_factory;
        }
    }

?>