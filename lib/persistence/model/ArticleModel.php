<?php 

    /**
     * 
     */
    class ArticleModel 
        extends DatabaseModel
            implements ArticleController, 
                       ArticleView
    {
        // Constructors
        /**
         * 
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

        /**
         * 
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
        /**
         * 
         */
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * 
         */
        final public function getTitle()
        {
            return $this->title;
        }


        /**
         * 
         */
        final public function getContent()
        {
            return $this->content;
        }

        /**
         * 
         */
        final public function getCreatedOn()
        {
            return $this->created_on;
        }


        /**
         * 
         */
        final public function getLastUpdated()
        {
            return $this->last_updated;
        }


        /**
         * 
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
         * 
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
         * 
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
         * 
         */
        final public function setCreatedOn( $var )
        {
            $this->created_on = $var;
        }

        
        /**
         * 
         */
        final public function setLastUpdated( $var )
        {
            $this->last_updated = $var;
        }

    }

?>