<?php
    /**
     *  Title: ProfileTypeFactory
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */


    /**
     * Class ProfileTypeFactory
     */
    class TimedDiscountFactory
        extends BaseFactoryTemplate
    {
        public const table = 'timed_discount';

        public const field_identity = 'identity';

        public const field_product_id = 'product_id';
        public const field_discount_begin = 'discount_begin';
        public const field_discount_end = 'discount_end';
        public const field_discount_percentage = 'discount_percentage';



        /**
         * ProfileTypeFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( ?MySQLConnectorWrapper $mysql_connector )
        {
            $this->setupBase();
            $this->setWrapper( $mysql_connector );
            $this->setPaginationAndLimit(CONSTANT_FIVE, CONSTANT_ZERO );
        }


        /**
         * @return string
         */
        public final static function getTableName()
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
         * @return ProfileTypeModel
         * @throws Exception
         */
        public final function createModel(): TimedDiscountModel
        {
            $model = new TimedDiscountModel( $this );
            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        public final function validateAsValidModel( $var ): bool
        {
            $retVal = false;

            if( $var instanceof TimedDiscountModel )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return array|null
         * @throws Exception
         */
        public final function read(): ?array
        {
            //
            $table = self::table;

            $sql = "SELECT * FROM {$table} LIMIT ? OFFSET ?;";

            $stmt_limit  = null;
            $stmt_offset = null;

            // Return Value
            $retVal = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii",
                                    $stmt_limit,
                                    $stmt_offset );

                $stmt_limit  = $this->getLimitValue();
                $stmt_offset = $this->CalculateOffset();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $model = $this->createModel();

                        $model->setIdentity( $row[ self::field_identity ] );

                        $model->setProductId( $row[ self::field_product_id ] );
                        $model->setDiscountBegin( $row[ self::field_discount_begin ] );
                        $model->setDiscountEnd( $row[ self::field_discount_end ] );
                        $model->setDiscountPercentage( $row[ self::field_discount_percentage ] );

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
         * @return array|null
         * @throws Exception
         */
        public final function readOrderedByDay(): ?array
        {
            //
            $table = self::table;

            $sql = "SELECT * FROM {$table} order by discount_begin LIMIT ? OFFSET ?;";

            $stmt_limit  = null;
            $stmt_offset = null;

            // Return Value
            $retVal = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii",
                    $stmt_limit,
                    $stmt_offset );

                $stmt_limit  = $this->getLimitValue();
                $stmt_offset = $this->CalculateOffset();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $model = $this->createModel();

                        $model->setIdentity( $row[ self::field_identity ] );

                        $model->setProductId( $row[ self::field_product_id ] );
                        $model->setDiscountBegin( $row[ self::field_discount_begin ] );
                        $model->setDiscountEnd( $row[ self::field_discount_end ] );
                        $model->setDiscountPercentage( $row[ self::field_discount_percentage ] );

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
         * @return bool|null
         * @throws Exception
         */
        public final function readModel( &$model ): ?bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $table = self::table;

            $fid = self::field_identity;

            $retVal = null;

            $connection = $this->getWrapper()->connect();

                $preparedsql_content = "SELECT * FROM {$table} WHERE {$fid} = ?;";

                try
                {
                    $stmt = $connection->prepare( $preparedsql_content );

                    $stmt->bind_param( "i",
                        $stmt_id );

                    $stmt_id  = $model->getIdentity();

                    $stmt->execute();
                    $result = $stmt->get_result();

                    if( $result->num_rows > CONSTANT_ZERO )
                    {
                        while( $row = $result->fetch_assoc() )
                        {
                            $model->setIdentity( $row[ self::field_identity ] );
                            $model->setProductId($row[self::field_product_id]);

                            $model->setDiscountBegin($row[self::field_discount_begin]);
                            $model->setDiscountEnd($row[self::field_discount_end]);
                            $model->setDiscountPercentage($row[self::field_discount_percentage]);

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

            $table = self::table;

            $sql = "INSERT INTO {$table}( product_id, discount_begin, discount_end, discount_percentage ) VALUES( ?, ?, ?, ? );";

            // Statement Variables
            $stmt_product_id = null;
            $stmt_discount_begin = null;
            $stmt_discount_end = null;
            $stmt_discount_percentage = null;

            // Return Value
            $retVal = false;

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );
                
                //
                $stmt->bind_param( "issi",
                                    $stmt_product_id,
                    $stmt_discount_begin,
                    $stmt_discount_end,
                    $stmt_discount_percentage );

                //
                $stmt_product_id = $model->getProductId();
                $stmt_discount_begin = $model->getDiscountBegin();
                $stmt_discount_end = $model->getDiscountEnd();
                $stmt_discount_percentage = $model->getDiscountPercentage();

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

            $table = self::table;

            $sql = "UPDATE {$table} SET product_id = ?, discount_begin = ?, discount_end = ?, discount_percentage = ? WHERE identity = ?";

            // Statement Variables
            $stmt_product_id = null;
            $stmt_discount_begin = null;
            $stmt_discount_end = null;
            $stmt_discount_percentage = null;
            $stmt_table_id = null;

            // Return Value
            $retVal = false;

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                //
                $stmt->bind_param( "issii",
                    $stmt_product_id,
                    $stmt_discount_begin,
                    $stmt_discount_end,
                    $stmt_discount_percentage,
                    $stmt_table_id );

                //
                $stmt_product_id = $model->getProductId();
                $stmt_discount_begin = $model->getDiscountBegin();
                $stmt_discount_end = $model->getDiscountEnd();
                $stmt_discount_percentage = $model->getDiscountPercentage();
                $stmt_table_id = $model->getIdentity();

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

            //
            $retVal = false;

            //
            $table = self::table;
            $fid = self::field_identity;

            $sql = "DELETE FROM {$table} WHERE {$fid} = ?;";

            $stmt_identity = null;

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );
                
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

            return $retVal;
        }


        /**
         * @return int
         * @throws Exception
         */
        public final function length(): int
        {
            $retVal = CONSTANT_ZERO;
            
            $table_name = self::table;
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

            return $retVal;
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