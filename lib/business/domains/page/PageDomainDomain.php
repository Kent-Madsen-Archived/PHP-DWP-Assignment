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
        }

    }

?>