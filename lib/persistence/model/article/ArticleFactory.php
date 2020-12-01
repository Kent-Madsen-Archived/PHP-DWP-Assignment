<?php
    /**
     *  Title: ArticleFactory
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ArticleFactory
     */
    class ArticleFactory
        extends BaseFactoryTemplate
    {
        private const field_identity        = 'identity';

        private const field_title           = 'title';
        private const field_content         = 'content';

        private const field_created_on      = 'created_on';
        private const field_last_updated    = 'last_updated';

        private const table_name = 'article';


        /**
         * ArticleFactory constructor.
         * @param MySQLConnectorWrapper|null $mysql_connector
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
        final public static function getTableName(): string
        {
            return self::table_name;
        }


        /**
         * @return string
         */
        final public function getFactoryTableName(): string
        {
            return strval( self::getTableName() );
        }


        /**
         * @return ArticleModel
         * @throws Exception
         */
        final public function createModel(): ArticleModel
        {
            $model = new ArticleModel( $this );
            return $model;
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public function exist(): bool
        {
            $status_factory = new StatusOnFactory( $this->getWrapper() );
            
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

            if( $var instanceof ArticleModel )
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
            // return array
            $retVal = null;

            // sql, that the prepared statement uses
            $tn = $this->getFactoryTableName();
            $sql = "SELECT * FROM {$tn} LIMIT ? OFFSET ?;";

            // prepare statement variables
            $stmt_limit  = null;
            $stmt_offset = null;

            $connection = $this->getWrapper()->connect();

            try 
            {
                $stmt = $connection->prepare( $sql );

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
                        $articleModel = $this->createModel();
                        
                        $articleModel->setIdentity( $row[ self::field_identity ] );
                        
                        $articleModel->setTitle( $row[ self::field_title ] );
                        $articleModel->setContent( $row[ self::field_content ] );

                        $articleModel->setCreatedOn( $row[ self::field_created_on ] );
                        $articleModel->setLastUpdated( $row[ self::field_last_updated ] );
    
                        array_push( $retVal, $articleModel );
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

            $connection = $this->getWrapper()->connect();

            // sql, that the prepared statement uses
            $tn = $this->getFactoryTableName();
            $sql = "SELECT * FROM {$tn} where identity = ?;";

            // return array
            $retVal = false;

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "i",
                    $stmt_identity );

                $stmt_identity = $model->getIdentity();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model->setIdentity( $row[ self::field_identity ] );

                        $model->setTitle( $row[ self::field_title ]  );
                        $model->setContent( $row[ self::field_content ] );

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

            return boolval( $retVal );
        }


        /**
         * @return array
         * @throws Exception
         */
        final public function readOrderedByCreationDate(): array
        {
            $connection = $this->getWrapper()->connect();

            // sql, that the prepared statement uses
            $tn = $this->getFactoryTableName();
            $sql = "SELECT * FROM {$tn} ORDER BY created_on DESC LIMIT ? OFFSET ?;";

            // prepare statement variables
            $stmt_limit  = null;
            $stmt_offset = null;

            // return array
            $retVal = null;

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii", 
                                   $stmt_limit, 
                                   $stmt_offset );

                $stmt_limit = $this->getLimitValue();
                $stmt_offset = $this->CalculateOffset();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();
                    
                    while( $row = $result->fetch_assoc() )
                    {
                        $articleModel = $this->createModel();
                        
                        $articleModel->setIdentity( $row[ self::field_identity ] );
                        
                        $articleModel->setTitle( $row[ self::field_title ]  );
                        $articleModel->setContent( $row[ self::field_content ]  );

                        $articleModel->setCreatedOn( $row[ self::field_created_on ] );
                        $articleModel->setLastUpdated( $row[ self::field_last_updated ] );
    
                        array_push( $retVal, $articleModel );
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
         * @return mixed
         * @throws Exception
         */
        final public function create( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // Statement Variables
            $stmt_title   = null;
            $stmt_content = null;

            // Return Values
            $retVal = false;

            $tn = $this->getFactoryTableName();

            $tft = self::field_title;
            $tfc = self::field_content;

            $sql = "INSERT INTO {$tn}( {$tft}, {$tfc} ) VALUES( ?, ? );";

            //
            $connection = $this->getWrapper()->connect();

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ss", 
                                    $stmt_title, 
                                    $stmt_content );

                $stmt_title   = $model->getTitle();
                $stmt_content = $model->getContent();

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

            return boolval( $retVal );
        }


        /**
         * @param $model
         * @return mixed
         * @throws Exception
         */
        final public function update( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception('Not accepted model');
            }

            $tn = $this->getFactoryTableName();

            $tft = self::field_title;
            $tfc = self::field_content;

            $tfi = self::field_identity;

            $sql = "UPDATE {$tn} SET {$tft} = ?, {$tfc} = ? WHERE {$tfi} = ?";

            $stmt_title     = null;
            $stmt_content   = null;
            $stmt_identity  = null;

            // Return Value
            $retVal = false;

            //
            $connection = $this->getWrapper()->connect();

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ssi", 
                                    $stmt_title, 
                                    $stmt_content, 
                                    $stmt_identity );

                $stmt_identity = $model->getIdentity();

                $stmt_title    = $model->getTitle();
                $stmt_content  = $model->getContent();

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
         * @return bool|mixed
         * @throws Exception
         */
        final public function delete( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // return value
            $retVal = false;

            // sql query
            $tn = $this->getFactoryTableName();
            $tfi = self::field_identity;

            $sql = "DELETE FROM {$tn} WHERE {$tfi} = ?;";

            // Statement Variables
            $stmt_identity = null;

            // opens a connection to the mysql database
            $local_connection = $this->getWrapper()->connect();


            try 
            {
                $stmt = $local_connection->prepare( $sql );

                $stmt->bind_param( "i", 
                                    $stmt_identity );

                $stmt_identity = $model->getIdentity();

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
         * @return int|mixed
         * @throws Exception
         */
        final public function length(): int
        {
            // SQL Query
            $table_name = self::getTableName();
            $sql = "SELECT count( * ) AS number_of_rows FROM {$table_name};";
            
            // Connection to the mysql Database
            $local_connection = $this->getWrapper()->connect();

            // Return Value
            $retVal = CONSTANT_ZERO;

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
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                //
                $this->getWrapper()->disconnect();
            }

            return intval( $retVal );
        }


        public function lengthCalculatedWithFilter(array $filter)
        {
            // TODO: Implement length_calculate_with_filter() method.
        }



    }

?>