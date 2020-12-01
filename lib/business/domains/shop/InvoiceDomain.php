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

        // Variables
        private $product_factory = null;
        private $product_entity_factory = null;
        private $brought_factory = null;

        private $profile_factory = null;

        //

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