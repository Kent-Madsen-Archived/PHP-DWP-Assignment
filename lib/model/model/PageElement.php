<?php 

    class PageElement 
        extends DatabaseModel
    {
        // Constructors
        function __construct( $factory )
        {
            $this->setFactory( $factory );   
        }

        // Variables
        private $identity = null;
        private $area_key = null;
        
        private $title      = null;
        private $content    = null;

        private $created_on     = null;
        private $last_update    = null;

        // accessors
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
        public function getContent()
        {
            return $this->content;
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
        public function getAreaKey()
        {
            return $this->area_key;
        }


        /**
         * 
         */
        public function setAreaKey( $var )
        {
            $this->area_key = $var;
        }

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
        public function setIdentity( $var )
        {
            $this->identity = $var;
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
        public function setCreatedOn( $var )
        {
            $this->created_on = $var;
        }

   
        /**
         * 
         */
        public function getLastUpdate()
        {
            return $this->last_update;
        }

        /**
         * 
         */
        public function setLastUpdate( $var )
        {
            $this->last_update = $var;
        }

    }

?>