<?php
    /**
     *  Title: ProductUsedImageFactory
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ProductUsedImageFactory
     */
    class ProductUsedImageFactory
        extends FactoryTemplate
    {
        /**
         * @return string
         */
        final public static function getTableName()
        {
            return 'product_used_images';
        }


        /**
         * @return string
         */
        final public function getFactoryTableName(): string
        {
            return self::getTableName();
        }


        /**
         * @return string
         */
        final public static function getViewName()
        {
            return 'ProductUsedImageView';
        }


        /**
         * @return string
         */
        final public static function getControllerName()
        {
            return 'ProductUsedImageController';
        }


        /**
         * ProductUsedImageFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        function __construct( $mysql_connector )
        {   
            $this->setWrapper( $mysql_connector );
            $this->setPaginationIndex(CONSTANT_ZERO);
            $this->setLimit(CONSTANT_ZERO);
        }


        /**
         * @return bool|mixed
         * @throws Exception
         */
        final public function exist(): bool
        {
            $status_factory = new StatusFactory( $this->getWrapper() );
            
            $database = $this->getWrapper()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::getTableName() );
            
            return boolval( $value );
        }


        /**
         * @return mixed|ProductUsedImageModel
         */
        final public function createModel()
        {
            $model = new ProductUsedImageModel( $this );

            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        final public function validateAsValidModel( $var )
        {
            $retVal = false;

            if( $var instanceof ProductUsedImageModel )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * TODO: This
         */
        final public function read()
        {

        }


        /**
         * @param $model
         * @return mixed|null
         * @throws Exception
         */
        final public function readModel(&$model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
            $retVal = null;

            return $retVal;
        }


        /**
         * @param $model
         * @return mixed|void
         * @throws Exception
         */
        final public function create( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }


            return false;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        final public function delete( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = false;

            $sql = "DELETE FROM product_used_images WHERE identity = ?;";

            $stmt_identity = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                //
                $stmt->bind_param( "i",
                    $stmt_identity );

                // Sets Statement Variables
                $stmt_identity = intval( $model->getIdentity(), 10 );

                // Executes the query
                $stmt->execute();

                // commits the statement
                $this->getWrapper()->finish();
                $retVal = true;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getWrapper()->undoState();
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getWrapper()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @param $model
         * @return mixed|void
         * @throws Exception
         */
        final public function update( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }


            return false;
        }


        /**
         * @return int|mixed
         * @throws Exception
         */
        final public function length(): int
        {
            $retVal = CONSTANT_ZERO;
            
            $table_name = self::getTableName();
            $sql = "SELECT count( * ) AS number_of_rows FROM {$table_name};";

            $connection = $this->getWrapper()->connect();

            try 
            {
                $stmt = $connection->prepare( $sql );
                
                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $retVal = $row[ 'number_of_rows' ];
                    }
                }  
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getWrapper()->disconnect();
            }

            return intval( $retVal );
        }


        /**
         * @param $classObject
         * @return bool
         * @throws Exception
         */
        final public function classHasImplementedView( $classObject )
        {
            $retVal = false;

            if( is_null( $classObject ) )
            {
                throw new Exception('ArticleFactory - Static Function - classHasImplementedView, classObject is null, function only accepts classes');
            }

            if( !is_object( $classObject ) )
            {
                throw new Exception('ArticleFactory - Static Function - classHasImplementedView, classObject is not a object., function only accepts classes');
            }

            if( FactoryTemplate::ModelImplements( $classObject, self::getViewName() ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            return boolval( $retVal );
        }

    }

?>