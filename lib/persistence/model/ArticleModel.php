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
        function __construct( $factory )
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
        protected function validateFactory( $factory )
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
        public function getIdentity()
        {
            return $this->identity;
        }


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
        public function getContent()
        {
            return $this->content;
        }

        /**
         * 
         */
        public function getCreatedOn()
        {
            return $this->created_on;
        }


        /**
         * 
         */
        public function getLastUpdated()
        {
            return $this->last_updated;
        }


        /**
         * 
         */
        public function setIdentity( $var )
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
        public function setTitle( $var )
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
        public function setContent( $var )
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
        public function setCreatedOn( $var )
        {
            $this->created_on = $var;
        }


        /**
         * 
         */
        public function setLastUpdated( $var )
        {
            $this->last_updated = $var;
        }

    }

?>