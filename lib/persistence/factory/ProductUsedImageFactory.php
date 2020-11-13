<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    class ProductUsedImageFactory
        extends Factory
    {
        /**
         * 
         */
        function __construct( $mysql_connector )
        {
            if( !$this->validateAsValidConnector( $mysql_connector ) )
            {
                throw new Exception( 'Not a valid connector' );
            }
            
            $this->setConnector( $mysql_connector );
        }

        final public function setup()
        {
            
        }

        final public function setupSecondaries()
        {
            
        }

        final public function exist_database()
        {
            $status_factory = new StatusFactory( $this->getConnector() );
            
            $value = $status_factory->getStatusOnTable('dwp_assignment', 'product_used_images');
            
            return $value;         
        }

        final public function createModel()
        {
            $model = new ProductUsedImageModel( $this );

            return $model;
        }

        /**
         * 
         */
        final public function validateAsValidModel( $var )
        {
            if( $var instanceof ProductUsedImageModel )
            {
                return true;
            }

            return false;
        }

        public function read()
        {

        }

        public function create( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

        }

        public function delete( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
        }

        public function update( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
        }
    }

?>