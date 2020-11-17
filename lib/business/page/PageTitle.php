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
         * @param string $title
         * @throws Exception
         */
        public function __construct( $title = WEBPAGE_DEFAULT_PAGE_TITLE )
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
         * @return string|null
         */
        public function getTitle(): ?string
        {
            if( is_null( $this->title ) )
            {
                return null;
            }

            return strval( $this->title );
        }


        /**
         * @param $var
         * @return string|null
         * @throws Exception
         */
        public function setTitle( $var ): ?string
        {
            if( is_null( $var ) )
            {
                $this->title = null;
                return $this->getTitle();
            }

            if( !is_string( $var ) )
            {
                throw new Exception('only string is allowed as parameter');
            }

            $this->title = strval( $var );

            return $this->getTitle();
        }


        /**
         * @return string|null
         * @throws Exception
         */
        public function clear(): ?string
        {
            $this->setTitle(null );
            return $this->getTitle();
        }


        /**
         * @param $var
         * @return string|null
         * @throws Exception
         */
        final public function appendToTitle( $var ): ?string
        {
            if( is_null( $var ) )
            {
                return $this->getTitle();
            }

            if(! is_string( $var ) )
            {
                throw new Exception('Input parameter is not a string');
            }

            if( is_null( $this->getTitle() ) )
            {
                $this->setTitle('');
            }

            $this->title .= $var;

            return strval( $this->title );
        }


        /**
         * @param $var
         * @return string|null
         * @throws Exception
         */
        final public function appendToTitleArray( $var ): ?string
        {
            if( is_null( $var ) )
            {
                return $this->getTitle();
            }

            if( !is_array( $var ) )
            {
                throw new Exception('');
            }

            foreach ( $var as $value )
            {
                $this->appendToTitle( $value );
            }
        }
    }
?>