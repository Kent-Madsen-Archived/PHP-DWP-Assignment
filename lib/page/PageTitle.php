<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    class PageTitle
    {
        // constructors
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
         * 
         */
        public function getTitle()
        {
            return $this->title;
        }

        /**
         * 
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
         * 
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