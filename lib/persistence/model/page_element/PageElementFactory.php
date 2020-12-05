<?php
    /**
     *  Title: PageElementFactory
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class PageElementFactory
     */
    class PageElementFactory
        extends BaseFactoryTemplate
    {
        public const table = 'page_element';

        public const field_identity = 'identity';
        public const field_area_key = 'area_key';

        public const field_title = 'title';
        public const field_content = 'content';

        public const field_created_on = 'created_on';
        public const field_last_updated = 'last_updated';


        /**
         * PageElementFactory constructor.
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
         * @return bool|mixed
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
         * @return PageElementModel
         * @throws Exception
         */
        public final function createModel(): PageElementModel
        {
            $model = new PageElementModel( $this );
            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        public final function validateAsValidModel( $var ): bool
        {
            $retVal = false;

            if( $var instanceof PageElementModel )
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
            // return array
            $retVal = null;

            // sql, that the prepared statement uses
            $table = self::table;
            $sql = "SELECT * FROM {$table} LIMIT ? OFFSET ?;";

            // prepare statement variables
            $stmt_limit = null;
            $stmt_offset = null;

            // opens a connection the mysql server
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );

                $stmt->bind_param( "ii",
                                    $stmt_limit,
                                    $stmt_offset );

                $stmt_limit     = $this->getLimitValue();
                $stmt_offset    = $this->CalculateOffset();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $brought = $this->createModel();

                        $brought->setIdentity( $row[ self::field_identity] );

                        $brought->setAreaKey( $row[ self::field_area_key ] );
                        
                        $brought->setTitle( $row[ self::field_title ] );
                        $brought->setContent( $row[ self::field_content ]  );
                        
                        $brought->setCreatedOn( $row[ self::field_created_on ] );
                        $brought->setLastUpdated( $row[ self::field_last_updated ] );

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

            // return array
            $retVal = false;

            // sql, that the prepared statement uses
            $table = self::table;
            $fid = self::field_identity;
            $sql = "SELECT * FROM {$table} WHERE {$fid} = ?;";

            // prepare statement variables
            $stmt_identity = null;

            // opens a connection the mysql server
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );

                $stmt->bind_param( "i",
                    $stmt_identity );

                $stmt_identity     = $model->getIdentity();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $model->setIdentity( $row[ self::field_identity ] );

                        $model->setAreaKey( $row[ self::field_area_key ] );

                        $model->setTitle( $row[ self::field_title ] );
                        $model->setContent( $row[ self::field_content ]  );

                        $model->setCreatedOn( $row[ self::field_created_on ] );
                        $model->setLastUpdated( $row[ self::field_last_updated ] );

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
            $fak = self::field_area_key;
            $ft = self::field_title;
            $fc = self::field_content;

            $sql = "INSERT INTO {$table}( {$fak}, {$ft}, {$fc} ) VALUES( ?, ?, ? );";

            // Statement Variables
            $stmt_pe_areakey    = null;
            $stmt_pe_title      = null;
            $stmt_pe_content    = null;

            // Return Value
            $retVal = false;

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                //
                $stmt->bind_param( "sss",
                       $stmt_pe_areakey,
                    $stmt_pe_title,
                            $stmt_pe_content );

                //
                $stmt_pe_areakey    = $model->getAreaKey();
                $stmt_pe_title      = $model->getTitle();
                $stmt_pe_content    = $model->getContent();

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
        public final function delete( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = false;

            $table = self::table;
            $fid = self::field_identity;

            $sql = "DELETE FROM {$table} WHERE {$fid} = ?;";

            $stmt_identity = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                //
                $stmt->bind_param( "i",
                    $stmt_identity );

                // Sets Statement Variables
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
            $fak = self::field_area_key;

            $ft = self::field_title;
            $fc = self::field_content;

            $fid = self::field_identity;

            $sql = "UPDATE {$table} SET {$fak} = ?, {$ft} = ?, {$fc} = ? WHERE {$fid} = ?";

            // Statement Variables
            $stmt_pe_areakey    = null;
            $stmt_pe_title      = null;
            $stmt_pe_content    = null;

            $stmt_pe_identity   = null;

            // Return Value
            $retVal = false;

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                //
                $stmt->bind_param( "sssi",
                    $stmt_pe_areakey,
                    $stmt_pe_title,
                    $stmt_pe_content,
                    $stmt_pe_identity );

                //
                $stmt_pe_areakey    = $model->getAreaKey();
                $stmt_pe_title      = $model->getTitle();
                $stmt_pe_content    = $model->getContent();

                $stmt_pe_identity = $model->getIdentity();

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
         * @return int
         * @throws Exception
         */
        public final function length(): int
        {
            $retVal = CONSTANT_ZERO;

            //
            $table_name = self::getTableName();
            $sql = "SELECT count( * ) AS number_of_rows FROM {$table_name};";

            // Opens a connection to a database
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