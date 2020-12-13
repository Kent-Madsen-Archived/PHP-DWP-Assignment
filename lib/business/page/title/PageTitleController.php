<?php

    class PageTitleController
    {
        /**
         * PageTitleController constructor.
         * @param $pageTitle
         * @throws Exception
         */
        public function __construct( $pageTitle )
        {
            $this->setPageTitle( $pageTitle );
        }


        /**
         * @param $str
         * @throws Exception
         */
        final public function append( $str )
        {
            $this->getPageTitle()->appendToTitle( $str );
        }

        //
        private $pageTitle = null;


        //
        /**
         * @return PageTitle|null
         */
        final public function getPageTitle(): ?PageTitle
        {
            if( is_null( $this->pageTitle ) )
            {
                return null;
            }

            return $this->pageTitle;
        }


        /**
         * @param $pageTitle
         * @return PageTitle|null
         * @throws Exception
         */
        final public function setPageTitle( $pageTitle ): ?PageTitle
        {
            if( is_null( $pageTitle ) )
            {
                $this->pageTitle = null;
                return $this->getPageTitle();
            }

            if( !( $pageTitle instanceof PageTitle ) )
            {
                PageTitleError::throwIsNotAnInstanceOfPageTitle();
            }

            $this->pageTitle = $pageTitle;

            return $this->getPageTitle();
        }


        /**
         * @return PageTitleController|null
         * @throws Exception
         */
        final static public function getSingletonController(): ?PageTitleController
        {
            return new PageTitleController( PageTitleSingleton::getInstance() );
        }
    }

?>