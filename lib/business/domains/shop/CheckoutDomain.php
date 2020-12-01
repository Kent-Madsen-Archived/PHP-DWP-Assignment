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

            $this->setBroughtProductFactory(new BroughtFactory(new MySQLConnectorWrapper($this->getInformation())));

            $this->setProductFactory(new ProductFactory(new MySQLConnectorWrapper($this->getInformation())));
            $this->setProductInvoiceFactory(new ProductInvoiceFactory(new MySQLConnectorWrapper($this->getInformation())));
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
         * @return null
         */
        public function getProductEntityFactory()
        {
            return $this->product_entity_factory;
        }

        /**
         * @param null $product_entity_factory
         */
        public function setProductEntityFactory($product_entity_factory): void
        {
            $this->product_entity_factory = $product_entity_factory;
        }

        /**
         * @return null
         */
        public function getProductInvoiceFactory()
        {
            return $this->product_invoice_factory;
        }

        /**
         * @param null $product_invoice_factory
         */
        public function setProductInvoiceFactory($product_invoice_factory): void
        {
            $this->product_invoice_factory = $product_invoice_factory;
        }

        /**
         * @return null
         */
        public function getBroughtProductFactory()
        {
            return $this->brought_product_factory;
        }

        /**
         * @return null
         */
        public function getPersonAddressFactory()
        {
            return $this->person_address_factory;
        }

        /**
         * @return null
         */
        public function getPersonEmailFactory()
        {
            return $this->person_email_factory;
        }

        /**
         * @return null
         */
        public function getPersonNameFactory()
        {
            return $this->person_name_factory;
        }

        /**
         * @return null
         */
        public function getProductFactory()
        {
            return $this->product_factory;
        }

        /**
         * @return null
         */
        public function getProfileFactory()
        {
            return $this->profile_factory;
        }

        /**
         * @param null $brought_product_factory
         */
        public function setBroughtProductFactory($brought_product_factory): void
        {
            $this->brought_product_factory = $brought_product_factory;
        }

        /**
         * @param null $person_address_factory
         */
        public function setPersonAddressFactory($person_address_factory): void
        {
            $this->person_address_factory = $person_address_factory;
        }

        /**
         * @param null $person_email_factory
         */
        public function setPersonEmailFactory($person_email_factory): void
        {
            $this->person_email_factory = $person_email_factory;
        }

        /**
         * @param null $person_name_factory
         */
        public function setPersonNameFactory($person_name_factory): void
        {
            $this->person_name_factory = $person_name_factory;
        }

        /**
         * @param null $product_factory
         */
        public function setProductFactory($product_factory): void
        {
            $this->product_factory = $product_factory;
        }

        /**
         * @param null $profile_factory
         */
        public function setProfileFactory($profile_factory): void
        {
            $this->profile_factory = $profile_factory;
        }
    }

?>