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

        private $product_factory = null;
        private $product_entity_factory = null;
        private $brought_factory = null;

        private $profile_factory = null;

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
        public function getProductEntityFactory()
        {
            return $this->product_entity_factory;
        }

        /**
         * @param null $profile_factory
         */
        public function setProfileFactory($profile_factory): void
        {
            $this->profile_factory = $profile_factory;
        }

        /**
         * @param null $product_factory
         */
        public function setProductFactory($product_factory): void
        {
            $this->product_factory = $product_factory;
        }

        /**
         * @return null
         */
        public function getProfileFactory()
        {
            return $this->profile_factory;
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
        public function getBroughtFactory()
        {
            return $this->brought_factory;
        }

        /**
         * @param null $brought_factory
         */
        public function setBroughtFactory($brought_factory): void
        {
            $this->brought_factory = $brought_factory;
        }

    }

?>