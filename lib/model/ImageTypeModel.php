<?php 

    class ImageTypeModel
        extends DatabaseModel
    {
        /**
         * 
         */
        function __construct( $factory )
        {
            $this->setFactory( $factory );   
        }
        
        // Variables
        private $identity = null;
        private $content = null;

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
    }

?>