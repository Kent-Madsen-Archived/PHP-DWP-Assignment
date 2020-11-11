<?php 

    /**
     * 
     */
    class ProductModel 
        extends DatabaseModel
            implements ProductView, 
                       ProductController
    {
        // constructors
        /**
         * 
         */
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        private $identity = null;
        private $title = null;
        private $description = null;
        private $price = null;

        public function getIdentity()
        {
            return $this->identity;
        }

        public function setIdentity( $var )
        {
            $this->identity = $var;
        }

        public function getDescription()
        {
            return $this->description;
        }

        public function setDescription( $var )
        {
            $this->description = $var;
        }

        public function getPrice()
        {
            return $this->price;
        }

        public function setPrice( $var )
        {
            $this->price = $var;
        }

        public function getTitle()
        {
            return $this->title;
        }

        public function setTitle( $var )
        {
            $this->title = $var;
        }


    }


?>