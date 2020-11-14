<?php

    /**
     * Class ArticleModel
     */
    class ArticleModel 
        extends DatabaseModel
            implements ArticleController, 
                       ArticleView
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
        private $identity = null;

        private $title      = null;
        private $content    = null;

        private $created_on     = null;
        private $last_updated   = null;


        // implementation of factory classes

        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ArticleFactory )
            {
                return true;
            }

            return false;
        }

        // Accessors
            // Getters
        /**
         * @return |null
         */
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return |null
         */
        final public function getTitle()
        {
            return $this->title;
        }


        /**
         * @return |null
         */
        final public function getContent()
        {
            return $this->content;
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
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            if( !( $this->identityValidation( $var ) ) )
            {
                throw new Exception( 'ArticleModel - setIdentity: null or integer number is allowed' );
            }
            
            $this->identity = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setTitle( $var )
        {
            if( !$this->genericStringValidation( $var ) )
            {
                throw new Exception( 'ArticleModel - setTitle: null or string is allowed' );
            }

            $this->title = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setContent( $var )
        {
            if( !$this->genericStringValidation( $var ) )
            {
                 throw new Exception( 'ArticleModel - setContent: null or string is allowed' );
            }

            $this->content = $var;
        }


        /**
         * @param $var
         */
        final public function setCreatedOn( $var )
        {
            $this->created_on = $var;
        }


        /**
         * @param $var
         */
        final public function setLastUpdated( $var )
        {
            $this->last_updated = $var;
        }

    }

?>