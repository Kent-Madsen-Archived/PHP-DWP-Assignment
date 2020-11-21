<?php
    /**
     *  Title: AssociatedCategoryFactory
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class AssociatedCategoryFactory
     */
    class AssociatedCategoryFactory
        extends FactoryTemplate
    {
        /**
         * AssociatedCategoryFactory constructor.
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
        final public static function getTableName(): string
        {
            return 'associated_category';
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
        final public static function getViewName(): string
        {
            return 'AssociatedCategoryView';
        }


        /**
         * @return string
         */
        final public static function getControllerName(): string
        {
            return 'AssociatedCategoryController';
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
         * @return AssociatedCategoryModel
         * @throws Exception
         */
        final public function createModel(): AssociatedCategoryModel
        {
            $model = new AssociatedCategoryModel( $this );
            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        final public function validateAsValidModel( $var ): bool
        {
            $retVal = false;

            if( $var instanceof AssociatedCategoryModel )
            {
                $retVal = true;
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
            $sql = "SELECT * FROM associated_category LIMIT ? OFFSET ?;";

            // Statement Variables
            $stmt_limit  = null;
            $stmt_offset = null;

            // Return Values
            $retVal = null;

            // Connection
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );

                $stmt->bind_param( "ii",
                                    $stmt_limit,
                                    $stmt_offset );

                $stmt_limit  = intval( $this->getLimit(), BASE_10 );
                $stmt_offset = intval( $this->CalculateOffset(), BASE_10 );

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();
                    
                    while( $row = $result->fetch_assoc() )
                    {
                        $model = $this->createModel();

                        $model->setIdentity( intval( $row[ 'identity' ], BASE_10 ) );

                        $model->setProductAttributeId( intval( $row[ 'product_attribute_id' ], BASE_10 ) );
                        $model->setProductCategoryId( intval( $row[ 'product_category_id' ], BASE_10 ) );
                        
                        $model->setProductId( intval( $row[ 'product_id' ], BASE_10 ) );

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

            $sql = "SELECT * FROM associated_category WHERE identity = ?;";
            
            $retVal = false;

            // Connection
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );

                $stmt->bind_param( "i",
                    $stmt_identity );

                $stmt_identity  = $model->getIdentity();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model->setIdentity( intval( $row[ 'identity' ], BASE_10 ) );

                        $model->setProductAttributeId( intval( $row[ 'product_attribute_id' ], BASE_10 ) );
                        $model->setProductCategoryId( intval( $row[ 'product_category_id' ], BASE_10 ) );

                        $model->setProductId( intval( $row[ 'product_id' ], BASE_10 ) );

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
         * @return bool
         * @throws Exception
         */
        final public function create( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // Statement Variables
            $stmt_attribute_id  = null;
            $stmt_category_id   = null;
            $stmt_product_id    = null;

            // Return Values
            $retVal = false;

            $sql = "INSERT INTO associated_category( product_attribute_id, product_category_id, product_id ) VALUES( ?, ?, ? );";

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "iii",
                    $stmt_attribute_id,
                    $stmt_category_id,
                           $stmt_product_id );

                $stmt_attribute_id  = intval( $model->getProductAttributeId(), BASE_10 );
                $stmt_category_id   = intval( $model->getProductCategoryId(), BASE_10 );

                $stmt_product_id    = intval( $model->getProductId(), BASE_10 );

                // Executes the query
                $stmt->execute();
                $model->setIdentity( intval( $this->getWrapper()->finishCommitAndRetrieveInsertId( $stmt ), BASE_10 ) );

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
         * @return bool
         * @throws Exception
         */
        final public function update( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // Statement Variables
            $stmt_attribute_id  = null;
            $stmt_category_id   = null;
            $stmt_product_id    = null;

            $stmt_identity      = null;

            // Return Values
            $retVal = false;

            $sql = "UPDATE associated_category, set product_attribute_id = ?, product_category_id = ?, product_id = ? WHERE identity = ?;";

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "iiii",
                    $stmt_attribute_id,
                    $stmt_category_id,
                    $stmt_product_id,
                    $stmt_identity );

                $stmt_attribute_id  = intval( $model->getProductAttributeId(), BASE_10 );
                $stmt_category_id   = intval( $model->getProductCategoryId(), BASE_10 );

                $stmt_product_id    = intval( $model->getProductId(), BASE_10 );

                $stmt_identity      = intval( $model->getIdentity(), BASE_10 );


                // Executes the query
                $stmt->execute();
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
         * @return bool
         * @throws Exception
         */
        final public function delete( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // SQL query
            $sql = "DELETE FROM associated_category WHERE identity = ?;";

            // Statement Variables
            $stmt_identity = null;

            // Return Value
            $retVal = false;

            //
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );
                
                //
                $stmt->bind_param( "i",  
                                    $stmt_identity );

                //
                $stmt_identity = intval( $model->getIdentity(), BASE_10 );

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
         * @return int
         * @throws Exception
         */
        final public function length(): int
        {
            // return value
            $retVal = CONSTANT_ZERO;

            // sql query
            $table_name = self::getTableName();
            $sql = "SELECT count( * ) AS number_of_rows FROM {$table_name};";

            // connection to the mysql database
            $local_connection = $this->getWrapper()->connect();

            try 
            {
                $stmt = $local_connection->prepare( $sql );
                
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
                // Rolls back, the changes
                $this->getWrapper()->undoState();
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