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
        extends BaseFactoryTemplate
    {
        public const filter_by_invoice_id = 'fb_id';

        public const table = 'brought_product';

        public const field_identity = 'identity';
        public const field_invoice_id = 'invoice_id';

        public const field_number_of_products = 'number_of_products';

        public const field_price=  'price';

        public const field_product_id = 'product_id';
        public const field_registered = 'registered';

        /**
         * BroughtFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( ?MySQLConnectorWrapper $mysql_connector )
        {
            $this->setupBase();
            $this->setWrapper( $mysql_connector );
            $this->setPaginationAndLimit(CONSTANT_FIVE, CONSTANT_ZERO);
        }

        private $filter = null;

        /**
         * @return array|null
         */
        public function getFilter(): ?array
        {
            return $this->filter;
        }

        /**
         * @param array|null $filter
         */
        public function setFilter( ?array $filter ): void
        {
            $this->filter = $filter;
        }


        /**
         * @return string
         */
        public final static function getTableName(): string
        {
            return self::table;
        }


        /**
         * @return string
         */
        public final function getFactoryTableName(): string
        {
            return self::table;
        }


        /**
         * @return BroughtProductModel
         * @throws Exception
         */
        public final function createModel(): BroughtProductModel
        {
            $model = new BroughtProductModel( $this );
            return $model;
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function exist(): bool
        {
            $status_factory = new StatusOnFactory( $this->getWrapper() );
            
            $database = $this->getWrapper()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::table );
            
            return $value;
        }


        /**
         * @param $var
         * @return bool
         */
        public final function validateAsValidModel( $var ): bool
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
        public final function read(): ?array
        {
            if( is_null( $this->filter ) )
            {
                return $this->readGlobal();
            }
            else
            {
                return $this->readFilter();
            }
        }


        /**
         * @return array
         * @throws Exception
         */
        private final function readGlobal(): array
        {

            // sql, that the prepared statement uses
            $table = self::table;
            $sql = "SELECT * FROM {$table} LIMIT ? OFFSET ?;";

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

                $stmt_limit  = $this->getLimitValue();
                $stmt_offset = $this->CalculateOffset();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $brought = $this->createModel();

                        $brought->setIdentity( $row[ self::field_identity ] );
                        $brought->setInvoiceId( $row[ self::field_invoice_id] );

                        $brought->setNumberOfProducts( $row[ self::field_number_of_products ] );

                        $brought->setPrice( $row[ self::field_price ] );

                        $brought->setProductId( $row[ self::field_product_id ] );
                        $brought->setRegistered( $row[ self::field_registered ] );

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
         * @return array
         * @throws Exception
         */
        private final function readFilter(): array
        {
            $table = self::table;
            $fiid = self::field_invoice_id;

            // sql, that the prepared statement uses
            $sql = "SELECT * FROM {$table} where {$fiid} = ?;";

            // prepare statement variables
            $stmt_invoice_id  = null;

            // return array
            $retVal = null;

            // get a local connection
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );

                $stmt->bind_param( "i",
                    $stmt_invoice_id );

                $stmt_invoice_id  = $this->getFilter()[self::filter_by_invoice_id];

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $brought = $this->createModel();

                        $brought->setIdentity( $row[ self::field_identity ] );
                        $brought->setInvoiceId( $row[ self::field_invoice_id ] );

                        $brought->setNumberOfProducts( $row[ self::field_number_of_products ] );

                        $brought->setPrice( $row[ self::field_price ] );

                        $brought->setProductId( $row[ self::field_product_id ] );
                        $brought->setRegistered( $row[ self::field_registered ] );

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
        public final function readModel( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // sql, that the prepared statement uses
            $table = self::table;
            $fid = self::field_identity;

            $sql = "SELECT * FROM {$table} WHERE {$fid} = ?;";

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
                        $model->setIdentity( $row[ self::field_identity ] );
                        $model->setInvoiceId( $row[ self::field_invoice_id ] );

                        $model->setNumberOfProducts( $row[ self::field_number_of_products ] );

                        $model->setPrice( $row[ self::field_price ] );

                        $model->setProductId( $row[ self::field_product_id ] );

                        $model->setRegistered( $row[ self::field_registered ] );

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

            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        public final function create( &$model ): bool
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

            $table = self::table;
            $fiid = self::field_invoice_id;
            $fnop = self::field_number_of_products;
            $fp = self::field_price;
            $fpid = self::field_product_id;


            $sql = "INSERT INTO {$table}( {$fiid}, {$fnop}, {$fp}, {$fpid} ) VALUES( ?, ?, ?, ? );";

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

                $stmt_invoice_id            = $model->getInvoiceId();
                $stmt_number_of_products    = $model->getNumberOfProducts();

                $stmt_price                 = $model->getPrice();
                $stmt_product_id            = $model->getProductId();

                // Executes the query
                $stmt->execute();
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

            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        public final function update( &$model ): bool
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

            $table = self::table;
            $fiid = self::field_invoice_id;
            $f_nop = self::field_number_of_products;
            $fp = self::field_price;
            $fpid = self::field_product_id;
            $fid = self::field_identity;

            $sql = "UPDATE {$table} SET {$fiid} = ?, {$f_nop} = ?, {$fp} = ?, {$fpid} = ? WHERE {$fid} = ?;";

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

                $stmt_invoice_id            = $model->getInvoiceId();
                $stmt_number_of_products    = $model->getNumberOfProducts();

                $stmt_price                 = $model->getPrice();

                $stmt_product_id            = $model->getProductId();

                $stmt_identity              = $model->getIdentity();

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

            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        public final function delete( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $table = self::table;
            $fid = self::field_identity;

            $sql = "DELETE FROM {$table} WHERE {$fid} = ?;";

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
        public final function length(): int
        {
            $table_name = self::table;
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
         * @param array $filter
         * @return mixed|void
         */
        public final function lengthCalculatedWithFilter(array $filter)
        {
            // TODO: Implement length_calculate_with_filter() method.
            return 0;
        }


        /**
         * @return string
         */
        public final function appendices(): string
        {
            // TODO: Implement appendices() method.
            return "";
        }


        /**
         * @param array $filters
         * @return bool
         */
        public final function insertOptions(array $filters): bool
        {
            // TODO: Implement insertOptions() method.
            return false;
        }


        /**
         *
         */
        public final function clearOptions(): void
        {
            // TODO: Implement clearOptions() method.
        }


    }

?>