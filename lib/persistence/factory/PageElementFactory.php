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
        extends FactoryTemplate
    {
        /**
         * PageElementFactory constructor.
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
            return 'page_element';
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
            return 'PageElementView';
        }


        /**
         * @return string
         */
        final public static function getControllerName(): string
        {
            return 'PageElementController';
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
         * @return PageElementModelEntity
         * @throws Exception
         */
        final public function createModel(): PageElementModelEntity
        {
            $model = new PageElementModelEntity( $this );

            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        final public function validateAsValidModel( $var ): bool
        {
            $retVal = false;

            if( $var instanceof PageElementModelEntity )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return array
         * @throws Exception
         */
        final public function read(): ?array
        {
            // return array
            $retVal = null;

            // sql, that the prepared statement uses
            $sql = "SELECT * FROM page_element LIMIT ? OFFSET ?;";

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

                $stmt_limit     = $this->getLimit();
                $stmt_offset    = $this->CalculateOffset();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $brought = $this->createModel();

                        $brought->setIdentity( $row[ 'identity' ] );

                        $brought->setAreaKey( $row[ 'area_key' ] );
                        
                        $brought->setTitle( $row[ 'title' ] );
                        $brought->setContent( $row[ 'content' ]  );
                        
                        $brought->setCreatedOn( $row[ 'created_on' ] );
                        $brought->setLastUpdated( $row[ 'last_updated' ] );

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


            // return array
            $retVal = false;

            // sql, that the prepared statement uses
            $sql = "SELECT * FROM page_element WHERE identity = ?;";

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
                        $model->setIdentity( $row[ 'identity' ] );

                        $model->setAreaKey( $row[ 'area_key' ] );

                        $model->setTitle( $row[ 'title' ] );
                        $model->setContent( $row[ 'content' ]  );

                        $model->setCreatedOn( $row[ 'created_on' ] );
                        $model->setLastUpdated( $row[ 'last_updated' ] );

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

            $sql = "INSERT INTO page_element( area_key, title, content ) VALUES( ?, ?, ? );";

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

            $sql = "DELETE FROM page_element WHERE identity = ?;";

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
        final public function update( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $sql = "UPDATE page_element SET area_key = ?, title = ?, content = ? WHERE identity = ?";

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

            return boolval( $retVal );
        }


        /**
         * @return int
         * @throws Exception
         */
        final public function length(): int
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