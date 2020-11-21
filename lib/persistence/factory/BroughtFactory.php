<?php
    /**
     *  Title: BroughtFactory
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class BroughtFactory
     */
    class BroughtFactory
        extends FactoryTemplate
    {
        /**
         * BroughtFactory constructor.
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
            return 'brought_product';
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
            return 'BroughtProductView';
        }


        /**
         * @return string
         */
        final public static function getControllerName()
        {
            return 'BroughtProductController';
        }


        /**
         * @return BroughtProductModel
         * @throws Exception
         */
        final public function createModel(): BroughtProductModel
        {
            $model = new BroughtProductModel( $this );
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
        final public function validateAsValidModel( $var ): bool
        {
            $retVal = false;

            if( $var instanceof BroughtProductModel )
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
            // sql, that the prepared statement uses
            $sql = "SELECT * FROM brought_product LIMIT ? OFFSET ?;";

            // prepare statement variables
            $stmt_limit  = null;
            $stmt_offset = null;

            // return array
            $retVal = null;

            // get a local connection
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );

                $stmt->bind_param( "ii",
                                    $stmt_limit,
                                    $stmt_offset );

                $stmt_limit  = $this->getLimit();
                $stmt_offset = $this->CalculateOffset();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $brought = $this->createModel();

                        $brought->setIdentity( $row[ 'identity' ] );
                        $brought->setInvoiceId( $row[ 'invoice_id' ] );
                        
                        $brought->setNumberOfProducts( $row[ 'number_of_products' ] );
                        
                        $brought->setPrice( $row[ 'price' ] );

                        $brought->setProductId( $row[ 'product_id' ] );
                        $brought->setRegistered( $row[ 'registered' ] );

                        array_push( $retVal, $brought );
                    }
                }
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error: ' . $ex );
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

            // sql, that the prepared statement uses
            $sql = "SELECT * FROM brought_product WHERE identity = ?;";

            // prepare statement variables
            $stmt_identity  = null;

            // return array
            $retVal = false;

            // get a local connection
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );

                $stmt->bind_param( "i",
                                    $stmt_identity );

                $stmt_identity  = intval( $model->getIdentity(), BASE_10 );

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model->setIdentity( intval( $row[ 'identity' ], BASE_10 ) );
                        $model->setInvoiceId( intval( $row[ 'invoice_id' ], BASE_10 ) );

                        $model->setNumberOfProducts( intval( $row[ 'number_of_products' ], BASE_10 ) );

                        $model->setPrice( doubleval( $row[ 'price' ] ) );

                        $model->setProductId( intval( $row[ 'product_id' ], BASE_10 ) );

                        $model->setRegistered( $row[ 'registered' ] );

                        $retVal = true;
                    }
                }
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error: ' . $ex );
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

            // Return Values
            $retVal = false;

            // Statement Variables
            $stmt_invoice_id            = null;
            $stmt_number_of_products    = null;
            $stmt_price                 = null;
            $stmt_product_id            = null;

            $sql = "INSERT INTO brought_product( invoice_id, number_of_products, price, product_id ) VALUES( ?, ?, ?, ? );";

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "iidi",
                                    $stmt_invoice_id,
                                    $stmt_number_of_products,
                                    $stmt_price,
                                    $stmt_product_id );

                $stmt_invoice_id            = intval( $model->getInvoiceId(), BASE_10 );
                $stmt_number_of_products    = intval( $model->getNumberOfProducts(), BASE_10 );
                $stmt_price                 = doubleval( $model->getPrice() );
                $stmt_product_id            = intval( $model->getProductId(), BASE_10 );

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

            // Return Values
            $retVal = false;

            // Statement Variables
            $stmt_invoice_id            = null;
            $stmt_number_of_products    = null;
            $stmt_price                 = null;
            $stmt_product_id            = null;

            $stmt_identity              = null;

            $sql = "UPDATE brought_product SET invoice_id = ?, number_of_products = ?, price = ?, product_id = ? WHERE identity = ?;";

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "iidii",
                    $stmt_invoice_id,
                    $stmt_number_of_products,
                    $stmt_price,
                    $stmt_product_id,
                    $stmt_identity );

                $stmt_invoice_id            = intval( $model->getInvoiceId(), BASE_10 );
                $stmt_number_of_products    = intval( $model->getNumberOfProducts(), BASE_10 );

                $stmt_price                 = doubleval( $model->getPrice() );

                $stmt_product_id            = intval( $model->getProductId(), BASE_10 );

                $stmt_identity              = intval( $model->getIdentity(), BASE_10 );

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

            $sql = "DELETE FROM brought_product WHERE identity = ?;";

            // Return value
            $retVal = false;

            // statement variables
            $stmt_identity = null;

            // opens a connection
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );
                
                //
                $stmt->bind_param( "i",  
                                    $stmt_identity );

                //
                $stmt_identity = $model->getIdentity();

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
            $table_name = self::getTableName();
            $sql = "SELECT count( * ) AS number_of_rows FROM {$table_name};";

            $retVal = CONSTANT_ZERO;

            //
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