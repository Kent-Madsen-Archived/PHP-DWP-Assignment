<?php 

    /**
     * 
     */
    class ArticleModel 
        extends DatabaseModel
            implements ArticleController, 
                       ArticleView
    {
        /**
         * 
         */
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        private $identity = null;
        private $title = null;
        private $content = null;
        private $created_on = null;
        private $last_updated = null;


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
            $this->identity = $var;
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
        public function setContent( $var )
        {
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