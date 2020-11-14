<?php

    class ProductEntityModel 
        extends DatabaseModel
        implements ProductEntityController,
                   ProductEntityView
    {
        // Constructors
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        // Variables
        private $identity = null;
        private $arrived = null;
        
        private $entity_code = null;

        private $product_id = null;
        private $brought_id = null;

        /**
         * 
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ProductEntityFactory )
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
        final public function getArrived()
        {
            return $this->arrived;
        }

        /**
         * 
         */
        final public function getEntityCode()
        {
            return $this->entity_code;
        }


        /**
         * 
         */
        final public function getProductId()
        {
            return $this->product_id;
        }

        /**
         * 
         */
        final public function getBrougth()
        {
            return $this->brought_id;
        }

            // Setters
        /**
         * 
         */
        final public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ProductEntityModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }


        /**
         * 
         */
        final public function setEntityCode( $var )
        {
            $this->entity_code = $var;
        }

        /**
         * 
         */
        final public function setProductId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->product_id = $var;
        }

        /**
         * 
         */
        final public function setBrought( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }
            
            $this->brought_id = $var;
        }

        /**
         * 
         */
        final public function setArrived( $var )
        {
            $this->arrived = $var;
        }

    }

?>