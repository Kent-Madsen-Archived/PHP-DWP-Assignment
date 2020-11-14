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
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }


        // Variables
        private $identity = null;

        private $title          = null;
        private $description    = null;
        private $price          = null;


        // implementation of factory classes
        /**
         * 
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ProductFactory )
            {
                return true;
            }

            return false;
        }


        // Accessors
            // Getters
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
        final public function getDescription()
        {
            return $this->description;
        }


        /**
         * 
         */
        final public function getPrice()
        {
            return $this->price;
        }


        /**
         * 
         */
        final public function getTitle()
        {
            return $this->title;
        }


            // Setters
        /**
         * 
         */
        final public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ProductModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }


        /**
         * 
         */
        final public function setDescription( $var )
        {
            $this->description = $var;
        }


        /**
         * 
         */
        final public function setPrice( $var )
        {
            $this->price = $var;
        }


        /**
         * 
         */
        final public function setTitle( $var )
        {
            $this->title = $var;
        }

    }

?>