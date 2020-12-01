<?php

    /**
     * Class PageDomain
     */
    class PageDomainDomain
        extends Domain
            implements PageDomainInteraction
    {
        /**
         *
         */
        public const class_name = "PageDomain";

        /**
         * PageDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setName(self::class_name );
            $this->setInformation( MySQLInformationSingleton::getSingleton() );

            $this->setPageElementFactory(new PageElementFactory(new MySQLConnectorWrapper($this->getInformation())));

        }

        private $pageElementFactory = null;

        public function retrievePageElementById( int $idx )
        {
            $factory = $this->getPageElementFactory();
            $model = $factory->createModel();
            $model->setIdentity( $idx );

            $factory->readModel($model);

            return $model;
        }

        /**
         * @return PageElementFactory
         */
        public function getPageElementFactory(): PageElementFactory
        {
            return $this->pageElementFactory;
        }

        /**
         * @param PageElementFactory $pageElementFactory
         */
        public function setPageElementFactory( PageElementFactory $pageElementFactory ): void
        {
            $this->pageElementFactory = $pageElementFactory;
        }
    }

?>