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
    class ProfileTypeFactory
        extends BaseFactoryTemplate
    {
        public const table = 'profile_type';

        public const field_identity = 'identity';
        public const field_content = 'content';


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
        public final function createModel(): ProfileTypeModel
        {
            $model = new ProfileTypeModel( $this );
            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        public final function validateAsValidModel( $var ): bool
        {
            $retVal = false;

            if( $var instanceof ProfileTypeModel )
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
                        $model->setContent( $row[ self::field_content ] );

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

            $fc = self::field_content;
            $fid = self::field_identity;

            $by_content = false;
            $by_identity = false;


            if( !is_null( $model->getContent() ) )
            {
                $by_content = true;
            }

            if( !is_null( $model->getIdentity() ) )
            {
                $by_identity = true;
            }

            $retVal = null;

            $connection = $this->getWrapper()->connect();

            if( $by_content )
            {
                $preparedsql_content = "SELECT * FROM {$table} WHERE lower( {$fc} ) = ?;";

                try
                {
                    $stmt = $connection->prepare( $preparedsql_content );

                    $stmt->bind_param( "s",
                        $stmt_content );

                    $stmt_content  = strtolower( $model->getContent() );

                    $stmt->execute();
                    $result = $stmt->get_result();

                    if( $result->num_rows > CONSTANT_ZERO )
                    {
                        while( $row = $result->fetch_assoc() )
                        {
                            $model->setIdentity( $row[ self::field_identity ] );
                            $model->setContent( $row[ self::field_content ] );

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

            }

            if( $by_identity )
            {
                $preparedsql_identity = "SELECT * FROM {$table} WHERE {$fid} = ?;";

                try
                {
                    $stmt = $connection->prepare( $preparedsql_identity );

                    $stmt->bind_param( "i",
                        $stmt_identity );

                    $stmt_identity  = $model->getIdentity();

                    $stmt->execute();
                    $result = $stmt->get_result();

                    if( $result->num_rows > CONSTANT_ZERO )
                    {
                        while( $row = $result->fetch_assoc() )
                        {
                            $model->setIdentity( $row[ self::field_identity ] );
                            $model->setContent( $row[ self::field_content ] );

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
            $fc = self::field_content;

            $sql = "INSERT INTO {$table}( {$fc} ) VALUES( ? );";

            // Statement Variables
            $stmt_profile_type_content = null;

            // Return Value
            $retVal = false;

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );
                
                //
                $stmt->bind_param( "s", 
                                    $stmt_profile_type_content );

                //
                $stmt_profile_type_content = $model->getContent();

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

            //
            $retVal = false;

            //
            $table = self::table;

            $fid = self::field_identity;
            $fc = self::field_content;

            $sql = "UPDATE {$table} SET {$fc} = ? WHERE {$fid} = ?;";

            $stmt_profile_type_content  = null;
            $stmt_identity              = null;

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                //
                $stmt->bind_param( "si",
                                    $stmt_profile_type_content,
                                    $stmt_identity );

                //
                $stmt_profile_type_content = $model->getContent();
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