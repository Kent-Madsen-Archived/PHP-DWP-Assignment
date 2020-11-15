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


        // implement interfaces
        /**
         * @return int|mixed|null
         */
        final public function viewIdentity()
        {
            if( $this->viewIsIdentityNull() )
            {
                return null;
            }

            return $this->getIdentity();
        }


        /**
         * @return bool|mixed
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->identity ) == true )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return $retVal;
        }

        
        // Variables
        private $identity = null;
        private $arrived  = null;
        
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
         * @return int|null
         */
        final public function getIdentity()
        {
            if( is_null( $this->identity ) )
            {
                return null;
            }

            return intval( $this->identity, self::base() );
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
         * @return int|null
         */
        final public function getProductId()
        {
            if( is_null( $this->product_id ) )
            {
                return null;
            }

            return intval( $this->product_id, self::base() );
        }


        /**
         * @return int|null
         */
        final public function getBrought()
        {
            if( is_null( $this->brought_id ) )
            {
                return null;
            }

            return intval( $this->brought_id, self::base() );
        }


            // Setters
        /**
         * @param $var
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ProductEntityModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $value;
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
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->product_id = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setBrought( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }
            
            $this->brought_id = $value;
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