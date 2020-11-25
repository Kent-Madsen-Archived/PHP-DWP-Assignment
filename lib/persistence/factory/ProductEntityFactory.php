<?php
    /**
     *  Title: ProductEntityFactory
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ProductEntityFactory
     */
    class ProductEntityFactory
        extends FactoryTemplate
    {
        /**
         * ProductEntityFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( $mysql_connector )
        {   
            $this->setWrapper( $mysql_connector );
            $this->setPaginationAndLimit(CONSTANT_FIVE, CONSTANT_ZERO);

        }


        /**
         * @return string
         */
        final public static function getTableName()
        {
            return 'product_entity';
        }


        /**
         * @return string
         */
        final public function getFactoryTableName():string
        {
            return self::getTableName();
        }


        /**
         * @return string
         */
        final public static function getViewName()
        {
            return 'ProductEntityView';
        }


        /**
         * @return string
         */
        final public static function getControllerName()
        {
            return 'ProductEntityController';
        }


        /**
         * @return ProductEntityModelEntity
         * @throws Exception
         */
        final public function createModel(): ProductEntityModelEntity
        {
            $model = new ProductEntityModelEntity( $this );
            return $model;
        }


        /**
         * @return bool
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
         * @param $var
         * @return bool
         */
        final public function validateAsValidModel( $var )
        {
            $retVal = false;

            if( $var instanceof ProductEntityModelEntity )
            {
                return $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return array|null
         * @throws Exception
         */
        final public function read(): ?array
        {
            //
            $sql = "SELECT * FROM product_entity LIMIT ? OFFSET ?;";

            $stmt_limit  = null;
            $stmt_offset = null;

            //
            $retVal = null;

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii",
                                    $stmt_limit,
                                    $stmt_offset );

                $stmt_limit = intval( $this->getLimit(), 10 );
                $stmt_offset = intval( $this->CalculateOffset(), 10 );

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $model = $this->createModel();

                        $model->setIdentity( intval( $row[ 'identity' ], 10 ) );

                        $model->setArrived( $row[ 'arrived' ] );
                        $model->setEntityCode( strval( $row[ 'entity_code' ] ) );

                        $model->setProductId( intval( $row[ 'product_id' ], 10 ) );
                        $model->setBrought( intval( $row[ 'brought_id' ], 10 ) );

                        array_push( $retVal, $model );
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

            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        final public function readModel( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            //
            $sql = "SELECT * FROM product_entity WHERE identity = ?;";
            $stmt_identity  = null;

            //
            $retVal = false;

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "i",
                    $stmt_identity );

                $stmt_identity = intval( $this->getLimit(), 10 );

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model->setIdentity( intval( $row[ 'identity' ], 10 ) );

                        $model->setArrived( $row[ 'arrived' ] );

                        $model->setEntityCode( strval( $row[ 'entity_code' ] ) );

                        $model->setProductId( intval( $row[ 'product_id' ], 10 ) );
                        $model->setBrought( intval( $row[ 'brought_id' ], 10 ) );

                        $retVal = true;
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

            return boolval( $retVal );
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

            $sql = "INSERT INTO product_entity( entity_code, product_id, brought_id ) VALUES( ?, ?, ? );";

            // Statement Variables
            $stmt_entity_code = null;
            $stmt_product_id  = null;
            $stmt_brougth_id  = null;

            // Return Value
            $retVal = false;

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                //
                $stmt->bind_param( "sii",
                    $stmt_entity_code, $stmt_product_id, $stmt_brougth_id );

                //
                $stmt_entity_code = $model->getEntityCode();
                $stmt_product_id  = $model->getProductId();
                $stmt_brougth_id  = $model->getBrought();

                // Executes the query
                $stmt->execute();

                // commits the statement
                $model->setIdentity( $this->getWrapper()->finishCommitAndRetrieveInsertId( $stmt ) );
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
        final public function delete( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = false;

            $sql = "DELETE FROM product_entity WHERE identity = ?;";

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
                        $retVal = intval( $row[ 'number_of_rows' ], 10 );
                    }
                }  
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                //
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