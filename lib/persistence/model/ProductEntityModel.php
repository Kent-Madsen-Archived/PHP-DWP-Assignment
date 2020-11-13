<?php

    class ProductEntityModel 
        extends DatabaseModel
        implements ProductEntityController,
                   ProductEntityView
    {
        // Constructors
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        // Variables
        private $identity = null;
        private $arrived = null;
        
        private $entity_code = null;

        private $product_id = null;
        private $brought_id = null;


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
        public function getArrived()
        {
            return $this->arrived;
        }

        /**
         * 
         */
        public function getEntityCode()
        {
            return $this->entity_code;
        }


        /**
         * 
         */
        public function getProductId()
        {
            return $this->product_id;
        }

        /**
         * 
         */
        public function getBrougth()
        {
            return $this->brought_id;
        }

        /**
         * 
         */
        public function setIdentity( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'ProductEntityModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }


        /**
         * 
         */
        public function setEntityCode( $var )
        {
            $this->entity_code = $var;
        }

        /**
         * 
         */
        public function setProductId( $var )
        {
            $this->product_id = $var;
        }

        /**
         * 
         */
        public function setBrought( $var )
        {
            $this->brought_id = $var;
        }

        /**
         * 
         */
        public function setArrived( $var )
        {
            $this->arrived = $var;
        }

    }

?>