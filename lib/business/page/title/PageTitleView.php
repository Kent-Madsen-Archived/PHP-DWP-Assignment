<?php

    /**
     * Class PageTitleView
     */
    class PageTitleView
    {
        /**
         * PageTitleView constructor.
         * @param $pageTitle
         * @throws Exception
         */
        public function __construct( $pageTitle )
        {
            $this->setPageTitle( $pageTitle );
        }


        /**
         * @return string
         * @throws Exception
         */
        public function printHTML(): string
        {
            if( is_null( $this->pageTitle ) )
            {
                throw new Exception('');
            }


            $title_html_encode = htmlentities( $this->getPageTitle()->getTitle() );
            $html = utf8_encode( "<title>{$title_html_encode}</title>");

            echo $html;

            return $html;
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
                throw new Exception('parameter is not a instance of PageTitle');
            }

            $this->pageTitle = $pageTitle;
            return $this->getPageTitle();
        }


        /**
         * @return PageTitleView|null
         * @throws Exception
         */
        final static public function getSingletonView(): ?PageTitleView
        {
            return new PageTitleView( PageTitleSingleton::getInstance() );
        }
    }

?>