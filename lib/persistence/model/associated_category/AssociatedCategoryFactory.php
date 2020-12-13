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
        extends BaseFactoryTemplate
    {
        public const table = 'associated_category';

        public const field_identity = 'identity';
        public const field_product_attribute_id = 'product_attribute_id';
        public const field_product_category_id = 'product_category_id';

        public const field_product_id = 'product_id';

        /**
         * AssociatedCategoryFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( ?MySQLConnectorWrapper $mysql_connector )
        {
            $this->setupBase();
            $this->setWrapper( $mysql_connector );
            $this->setPaginationAndLimit(CONSTANT_FIVE, CONSTANT_ZERO);
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
         * @return bool
         * @throws Exception
         */
        public final function exist(): bool
        {
            $status_factory = new StatusOnFactory( $this->getWrapper() );
            
            $database = $this->getWrapper()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::getTableName() );
            
            return $value;
        }


        /**
         * @return AssociatedCategoryModel
         * @throws Exception
         */
        public final function createModel(): AssociatedCategoryModel
        {
            $model = new AssociatedCategoryModel( $this );
            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        public final function validateAsValidModel( $var ): bool
        {
            $retVal = false;

            if( $var instanceof AssociatedCategoryModel )
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

                        $model->setProductAttributeId( $row[ self::field_product_attribute_id ] );
                        $model->setProductCategoryId( $row[ self::field_product_category_id ] );
                        
                        $model->setProductId( $row[ self::field_product_id ] );

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
        public final function readModel( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = false;

            if( !is_null( $model->getIdentity() ) )
            {
                $retVal = $this->readModelByIdentity($model );
                return $retVal;
            }

            if( !is_null( $model->getProductId() ) )
            {
                $retVal = $this->readModelByProductId($model);
            }


            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        protected final function readModelByIdentity( &$model ): bool
        {
            $table = self::table;
            $fid = self::field_identity;
            $sql = "SELECT * FROM {$table} WHERE {$fid} = ?;";

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
                        $model->setIdentity( $row[ self::field_identity ] );

                        $model->setProductAttributeId( $row[ self::field_product_attribute_id ] );
                        $model->setProductCategoryId( $row[ self::field_product_category_id ] );

                        $model->setProductId( $row[ self::field_product_id ] );

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

            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        protected final function readModelByProductId( &$model ): bool
        {
            $table = self::table;
            $fpid = self::field_product_id;

            $sql = "SELECT * FROM {$table} WHERE {$fpid} = ?;";

            $retVal = false;

            // Connection
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );

                $stmt->bind_param( "i",
                    $stmt_product_id );

                $stmt_product_id  = $model->getProductId();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model->setIdentity( $row[ self::field_identity ] );

                        $model->setProductAttributeId( $row[ self::field_product_attribute_id ] );
                        $model->setProductCategoryId( $row[ self::field_product_category_id ] );

                        $model->setProductId( $row[ self::field_product_id ] );

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

            // Statement Variables
            $stmt_attribute_id  = null;
            $stmt_category_id   = null;
            $stmt_product_id    = null;

            // Return Values
            $retVal = false;

            $table = self::table;

            $fpaid = self::field_product_attribute_id;
            $fpc_id = self::field_product_category_id;
            $fp_id = self::field_product_id;

            $sql = "INSERT INTO {$table}( {$fpaid}, {$fpc_id}, {$fp_id} ) VALUES( ?, ?, ? );";

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "iii",
                    $stmt_attribute_id,
                    $stmt_category_id,
                           $stmt_product_id );

                $stmt_attribute_id  = $model->getProductAttributeId();
                $stmt_category_id   = $model->getProductCategoryId();

                $stmt_product_id    = $model->getProductId();

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

            // Statement Variables
            $stmt_attribute_id  = null;
            $stmt_category_id   = null;
            $stmt_product_id    = null;

            $stmt_identity      = null;

            // Return Values
            $retVal = false;

            $table = self::table;

            $fid = self::field_identity;
            $f_pid = self::field_product_id;
            $f_pc_id = self::field_product_category_id;
            $f_att_id = self::field_product_attribute_id;

            $sql = "UPDATE {$table} SET {$f_att_id} = ?, {$f_pc_id} = ?, {$f_pid} = ? WHERE {$fid} = ?;";

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

                $stmt_attribute_id  = $model->getProductAttributeId();
                $stmt_category_id   = $model->getProductCategoryId();

                $stmt_product_id    = $model->getProductId();

                $stmt_identity      = $model->getIdentity();


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

            // SQL query
            $table = self::table;
            $fid = self::field_identity;

            $sql = "DELETE FROM {$table} WHERE {$fid} = ?;";

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
            // return value
            $retVal = CONSTANT_ZERO;

            // sql query
            $table_name = self::table;
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

            return $retVal;
        }


        /**
         * @param array $filter
         * @return mixed|void
         */
        public final function lengthCalculatedWithFilter(array $filter)
        {
            // TODO: Implement lengthCalculatedWithFilter() method.
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