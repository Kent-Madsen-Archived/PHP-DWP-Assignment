<?php

    /**
     * Class ProductEntityModel
     */
    class ProductEntityModel 
        extends DatabaseModel
        implements ProductEntityController,
                   ProductEntityView
    {
        // Constructors
        /**
         * ProductEntityModel constructor.
         * @param $factory
         * @throws Exception
         */
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


        // implementation of factory classes

        /**
         * @param $factory
         * @return bool|mixed
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
         * @return |null
         */
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return |null
         */
        final public function getArrived()
        {
            return $this->arrived;
        }


        /**
         * @return |null
         */
        final public function getEntityCode()
        {
            return $this->entity_code;
        }


        /**
         * @return |null
         */
        final public function getProductId()
        {
            return $this->product_id;
        }


        /**
         * @return |null
         */
        final public function getBrougth()
        {
            return $this->brought_id;
        }


            // Setters

        /**
         * @param $var
         * @throws Exception
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
         * @param $var
         */
        final public function setEntityCode( $var )
        {
            $this->entity_code = $var;
        }


        /**
         * @param $var
         * @throws Exception
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
         * @param $var
         * @throws Exception
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
         * @param $var
         */
        final public function setArrived( $var )
        {
            $this->arrived = $var;
        }

    }

?>