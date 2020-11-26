<?php
    /**
     * Class ArticleModel
     */
    class ArticleModelEntity
        extends DatabaseModelEntity
    {
        // Constructors
        /**
         * ArticleModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        
        // Variables
        private $title      = null;
        private $content    = null;

        private $created_on     = null;
        private $last_updated   = null;

        private $view       = null;
        private $controller = null;


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return boolval( $retVal );
        }


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            $retval = false;

            if( $factory instanceof ArticleFactory )
            {
                $retval = true;
            }

            return boolval( $retval );
        }


        // Accessors
            // Getters
        /**
         * @return string|null
         */
        final public function getTitle()
        {
            if( is_null( $this->title ) )
            {
                return null;
            }

            return strval( $this->title );
        }


        /**
         * @return string|null
         */
        final public function getContent()
        {
            if( is_null( $this->content ) )
            {
                return null;
            }

            return strval( $this->content );
        }


        /**
         * @return null
         */
        public function getController(): ?ArticleController
        {
            return $this->controller;
        }


        /**
         * @return bool
         */
        public function isControllerNull(): bool
        {
            return is_null($this->controller);
        }


        /**
         * @return null
         */
        public function getView(): ?ArticleView
        {
            return $this->view;
        }


        /**
         * @return bool
         */
        public function isViewNull(): bool
        {
            return is_null( $this->view );
        }


        /**
         * @return |null
         */
        final public function getCreatedOn()
        {
            return $this->created_on;
        }


        /**
         * @return |null
         */
        final public function getLastUpdated()
        {
            return $this->last_updated;
        }


            // Setters
        /**
         * @param $var
         * @return string|null
         * @throws Exception
         */
        final public function setTitle( $var ): ?string
        {
            if( is_null( $var ) )
            {
                $this->title = null;
                return $this->title;
            }

            if( !is_string( $var ) )
            {
                throw new Exception( 'ArticleModel - setTitle: null or string is allowed' );
            }

            $this->title = strval( $var );
            return $this->title;
        }


        /**
         * @param $var
         * @return string|null
         * @throws Exception
         */
        final public function setContent( $var ): ?string
        {
            if( is_null( $var ) )
            {
                $this->content = null;
                return $this->content;
            }

            if( !is_string( $var ) )
            {
                 throw new Exception( 'ArticleModel - setContent: null or string is allowed' );
            }

            $this->content = strval( $var );
            return $this->content;
        }


        /**
         * @param $var
         */
        final public function setCreatedOn( $var ): void
        {
            $this->created_on = $var;
        }


        /**
         * @param $var
         */
        final public function setLastUpdated( $var ): void
        {
            $this->last_updated = $var;
        }


        /**
         * @param $controller
         * @return ArticleController|null
         */
        public function setController( $controller ): ?ArticleController
        {
            $this->controller = $controller;
            return $this->getController();
        }


        /**
         * @param $view
         * @return ArticleView|null
         */
        public function setView( $view ): ?ArticleView
        {
            $this->view = $view;
            return $this->getView();
        }
    }

?>