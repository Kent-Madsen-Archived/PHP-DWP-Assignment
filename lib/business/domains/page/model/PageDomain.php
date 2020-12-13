<?php

    /**
     * Class PageDomain
     */
    class PageDomain
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
        }


        /**
         * @return array|null
         * @throws Exception
         */
        public final function retrievePageElements(): ?array
        {
            $factory = $this->getPageElementFactory();

            $factory->setPaginationIndexValue(0);
            $factory->setLimitValue(10);

            $m = $factory->read();
            return $m;
        }


        /**
         * @param int $idx
         * @return PageElementModel
         * @throws Exception
         */
        public final function retrievePageElementById( int $idx )
        {
            $factory = $this->getPageElementFactory();
            $model = $factory->createModel();
            $model->setIdentity( $idx );

            $factory->readModel($model);

            return $model;
        }


        /**
         * @param string $idx
         * @return PageElementModel
         * @throws Exception
         */
        public final function retrievePageElementByAreaKey( string $idx )
        {
            $factory = $this->getPageElementFactory();
            $model = $factory->createModel();

            $model->setAreaKey( $idx );
            $factory->readModel($model);

            return $model;
        }


        /**
         * @return PageElementFactory
         * @throws Exception
         */
        public final function getPageElementFactory(): PageElementFactory
        {
            return GroupElements::getPageElementFactory();
        }

    }

?>