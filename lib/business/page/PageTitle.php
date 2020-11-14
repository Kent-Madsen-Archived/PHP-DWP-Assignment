<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class PageTitle
     */
    class PageTitle
    {
        // constructors
        /**
         * PageTitle constructor.
         * @param $title
         */
        public function __construct( $title )
        {
            if( $title == null )
            {
                $this->setTitle( WEBPAGE_DEFAULT_PAGE_TITLE );
            }
            else 
            {
                $this->setTitle( $title );
            }
        }

        // Internal Variables
        private $title = null;

        // Accessors

        /**
         * @return null
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * @param $var
         */
        public function setTitle( $var )
        {
            $this->title = $var;
        }

        /**
         *
         */
        public function clear()
        {
            $this->title = '';
        }

        /**
         * @param $var
         */
        public function appendToTitle( $var )
        {
            $this->title = $this->title . $var;
        }

        // Placeholder functions

        /**
         *
         */
        public function printDocumentTitle()
        {
            echo "<title>" . $this->getTitle() . "</title>";
        }
    }
?>