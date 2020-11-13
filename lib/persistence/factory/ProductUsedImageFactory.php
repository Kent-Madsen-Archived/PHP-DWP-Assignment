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
        final public static function getTableName()
        {
            return 'product_used_images';
        }

        /**
         * 
         */
        final public function getFactoryTableName()
        {
            return self::getTableName();
        }

        /**
         * 
         */
        function __construct( $mysql_connector )
        {   
            $this->setConnector( $mysql_connector );
        }

        /**
         * 
         */
        final public function setup()
        {
            
        }

        /**
         * 
         */
        final public function setupSecondaries()
        {
            
        }

        /**
         * 
         */
        final public function exist_database()
        {
            $status_factory = new StatusFactory( $this->getConnector() );
            
            $database = $this->getConnector()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::getTableName() );
            
            return $value;         
        }

        /**
         * 
         */
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

        /**
         * 
         */
        final public function read()
        {

        }

        /**
         * 
         */
        final public function create( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

        }

        /**
         * 
         */
        final public function delete( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
        }

        /**
         * 
         */
        final public function update( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
        }

        /**
         * 
         */
        final public function length()
        {
            return 0;
        }
    }

?>