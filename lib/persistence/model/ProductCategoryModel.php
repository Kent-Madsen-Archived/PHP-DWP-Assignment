<?php 

    class ProductCategoryModel 
        extends DatabaseModel
        implements ProductCategoryController,
                   ProductCategoryView
    {
        // Constructors
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        // Variables
        private $identity = null;
        private $content  = null;

        // accessors
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
        public function setContent( $var )
        {
            $this->content = $var;
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
        public function getContent()
        {
            return $this->content;
        }

    }

?>