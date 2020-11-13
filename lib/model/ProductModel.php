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

        // Variables
        private $identity = null;

        private $title          = null;
        private $description    = null;
        private $price          = null;

        // Accessors
        final public function getIdentity()
        {
            return $this->identity;
        }

        final public function getDescription()
        {
            return $this->description;
        }

        final public function getPrice()
        {
            return $this->price;
        }

        final public function getTitle()
        {
            return $this->title;
        }

        final public function setIdentity( $var )
        {
            $this->identity = $var;
        }

        final public function setDescription( $var )
        {
            $this->description = $var;
        }

        final public function setPrice( $var )
        {
            $this->price = $var;
        }

        final public function setTitle( $var )
        {
            $this->title = $var;
        }

    }

?>