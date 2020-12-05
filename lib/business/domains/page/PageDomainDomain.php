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
         * PageDomainDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->setName(self::class_name );
            $this->setInformation( MySQLInformationSingleton::getSingleton() );

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