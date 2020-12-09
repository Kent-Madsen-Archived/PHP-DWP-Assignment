<?php

    /**
     * Class ProductEntityModel
     */
    class ProductEntityModel
        extends DatabaseModelEntity
    {
        // Constructors
        /**
         * ProductEntityModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( ?ProductEntityFactory $factory )
        {
            $this->setFactory( $factory );
        }


        /**
         * @return bool
         */
        final public function requiredFieldsValidated(): bool
        {
            $retVal = false;

            $entity_code_has_input = !is_null($this->entity_code);

            $product_id_has_input = !is_null($this->brought_id);
            $brought_id_has_input = !is_null($this->product_id);

            $retVal = $entity_code_has_input && $product_id_has_input && $brought_id_has_input;

            return $retVal;
        }

        
        // Variables
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

            return intval( $this->product_id, BASE_10 );
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

            return intval( $this->brought_id, BASE_10 );
        }


            // Setters
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

            if( !is_int( $var ) )
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
            if( !is_int( $var ) )
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