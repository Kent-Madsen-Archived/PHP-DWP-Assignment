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


        /**
         * @return null
         */
        public final function getProductEntityFactory()
        {
            return $this->product_entity_factory;
        }


        /**
         * @param null $product_entity_factory
         */
        public final function setProductEntityFactory($product_entity_factory): void
        {
            $this->product_entity_factory = $product_entity_factory;
        }


        /**
         * @return null
         */
        public final function getProductInvoiceFactory()
        {
            return $this->product_invoice_factory;
        }


        /**
         * @param null $product_invoice_factory
         */
        public final function setProductInvoiceFactory($product_invoice_factory): void
        {
            $this->product_invoice_factory = $product_invoice_factory;
        }


        /**
         * @return null
         */
        public final function getBroughtProductFactory()
        {
            return $this->brought_product_factory;
        }


        /**
         * @return null
         */
        public final function getPersonAddressFactory()
        {
            return $this->person_address_factory;
        }


        /**
         * @return null
         */
        public final function getPersonEmailFactory()
        {
            return $this->person_email_factory;
        }


        /**
         * @return null
         */
        public final function getPersonNameFactory()
        {
            return $this->person_name_factory;
        }

        /**
         * @return null
         */
        public final function getProductFactory()
        {
            return $this->product_factory;
        }


        /**
         * @return ProductFactory
         */
        public final function getProfileFactory(): ?ProductFactory
        {
            return $this->profile_factory;
        }


        /**
         * @param null $brought_product_factory
         */
        public final function setBroughtProductFactory($brought_product_factory): void
        {
            $this->brought_product_factory = $brought_product_factory;
        }


        /**
         * @param null $person_address_factory
         */
        public final function setPersonAddressFactory($person_address_factory): void
        {
            $this->person_address_factory = $person_address_factory;
        }
        

        /**
         * @param null $person_email_factory
         */
        public final function setPersonEmailFactory($person_email_factory): void
        {
            $this->person_email_factory = $person_email_factory;
        }

        /**
         * @param null $person_name_factory
         */
        public final function setPersonNameFactory($person_name_factory): void
        {
            $this->person_name_factory = $person_name_factory;
        }

        /**
         * @param null $product_factory
         */
        public final function setProductFactory($product_factory): void
        {
            $this->product_factory = $product_factory;
        }

        /**
         * @param null $profile_factory
         */
        public final function setProfileFactory($profile_factory): void
        {
            $this->profile_factory = $profile_factory;
        }
    }

?>