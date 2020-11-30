<?php
    /**
     *  Title: ContactFactory
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ContactFactory
     */
    class ContactBaseFactoryTemplate
        extends BaseFactoryTemplate
    {
        /**
         * ContactFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( $mysql_connector )
        {
            $this->setWrapper( $mysql_connector );
            $this->setPaginationAndLimit( CONSTANT_FIVE, CONSTANT_ZERO );
        }


        /**
         * @return string
         */
        final public static function getTableName()
        {
            return 'contact';
        }


        /**
         * @return mixed|string
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
            return 'ContactView';
        }


        /**
         * @return string
         */
        final public static function getControllerName()
        {
            return 'ContactController';
        }


        /**
         * @return ContactModelEntity
         * @throws Exception
         */
        final public function createModel(): ContactModelEntity
        {
            $model = new ContactModelEntity( $this );
            return $model;
        }


        /**
         * @return ContactModelFormEntity
         */
        final public function createFormModel(): ContactModelFormEntity
        {
            $model = new ContactModelFormEntity();
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

            if( $var instanceof ContactModelEntity )
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
            // Return value
            $retVal = null;

            // SQL Query
            $sql = "SELECT * FROM contact LIMIT ? OFFSET ?;";

            //
            $stmt_limit = null;
            $stmt_offset = null;

            // opens a connection to the database
            $connection = $this->getWrapper()->connect();

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii", 
                                   $stmt_limit, 
                                   $stmt_offset );

                $stmt_limit = $this->getLimit();
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

                        $model->setIdentity( $row[ 'identity' ] );

                        $model->setSubject( $row[ 'title' ] );
                        $model->setMessage( $row[ 'message' ] );

                        $model->setToMail( $row[ 'to_id' ] );
                        $model->setFromMail( $row[ 'from_id' ] );

                        $model->setCreatedOn( $row[ 'created_on' ] );
                        $model->setHasBeenSend( $row[ 'has_been_send' ] );

                        array_push( $retVal, $model );
                    }
                }
            }
            catch( Exception $ex )
            {
                throw new Exception('Error: ' . $ex );   
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
        final public function readFormsNotSended(): ?array
        {
            // Return value
            $retVal = null;

            // SQL Query
            $sql = "SELECT * FROM contact_model_view WHERE has_been_send = 0 LIMIT ? OFFSET ?;";

            //
            $stmt_limit = null;
            $stmt_offset = null;

            // opens a connection to the database
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii",
                                    $stmt_limit,
                                    $stmt_offset );

                $stmt_limit = $this->getLimit();
                $stmt_offset = $this->CalculateOffset();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $model = $this->createFormModel();

                        $model->setIdentity( $row[ 'identity' ] );

                        $model->setTitle( $row[ 'title' ] );
                        $model->setMessage( $row[ 'message' ] );

                        $model->setToEmail( $row[ 'to_mail' ] );
                        $model->setFromEmail( $row[ 'from_mail' ] );

                        $model->setCreatedOn( $row[ 'created_on' ] );
                        $model->setHasBeenSend( $row[ 'has_been_send' ] );

                        $model->done();

                        array_push( $retVal, $model );
                    }
                }
            }
            catch( Exception $ex )
            {
                throw new Exception('Error: ' . $ex );
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

            // Return value
            $retVal = null;

            // SQL Query
            $sql = "SELECT * FROM contact WHERE identity = ?;";

            //
            $stmt_identity = null;

            // opens a connection to the database
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "i",
                    $stmt_identity );

                $stmt_identity = intval( $model->getIdentity(), BASE_10 );

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model->setIdentity( intval( $row[ 'identity' ], BASE_10 ) );

                        $model->setSubject( strval( $row[ 'title' ] ) );
                        $model->setMessage( strval( $row[ 'message' ] ) );

                        $model->setToMail( intval( $row[ 'to_id' ], BASE_10 ) );
                        $model->setFromMail( intval( $row[ 'from_id' ], BASE_10 ) );

                        $model->setCreatedOn( $row[ 'created_on' ] );
                        $model->setHasBeenSend( $row[ 'has_been_send' ] );

                        $retVal = true;
                    }
                }
            }
            catch( Exception $ex )
            {
                throw new Exception('Error: ' . $ex );
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
        final public function create( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
            $retVal = false;

            $sql = "INSERT INTO contact( title, message, has_been_send, to_id, from_id ) VALUES( ?, ?, ?, ?, ? );";

            $stmt_subject = null;
            $stmt_message = null;

            $stmt_has_been_send = null;

            $stmt_to_id     = null;
            $stmt_from_id   = null;

            $connection = $this->getWrapper()->connect();

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ssiii", 
                                   $stmt_subject, 
                                   $stmt_message, 
                                   $stmt_has_been_send, 
                                   $stmt_to_id, 
                                   $stmt_from_id );

                // Setup variables
                $stmt_subject = $model->getSubject();
                $stmt_message = $model->getMessage();
                
                $stmt_has_been_send = $model->getHasBeenSend();

                $stmt_to_id   = $model->getToMail();
                $stmt_from_id = $model->getFromMail();
                
                // Executes the query
                $stmt->execute();

                // Apply Identity
                $model->setIdentity( $this->getWrapper()->finishCommitAndRetrieveInsertId( $stmt ) );
                $retVal = true;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getWrapper()->undoState();
                throw new Exception( "Error: " . $ex );
            }
            finally 
            {
                // Leaves the connection.
                $this->getWrapper()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @param $model
         * @return bool|mixed
         * @throws Exception
         */
        final public function delete( &$model ):bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = false;

            $sql = "DELETE FROM contact WHERE identity = ?;";

            $stmt_identity = null;

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

            return boolval( $retVal );
        }


        /**
         * @param $model
         * @return bool|mixed
         * @throws Exception
         */
        final public function update( &$model ):bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = null;

            $sql = "UPDATE contact SET subject_title = ?, message = ?, has_been_send = ?, to_id = ?, from_id = ? WHERE identity = ?;";

            $stmt_subject = null;
            $stmt_message = null;
            $stmt_has_been_send = null;

            $stmt_to_id = null;
            $stmt_from_id = null;

            $stmt_identity = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ssiiii",
                                    $stmt_subject,
                                    $stmt_message,
                                    $stmt_has_been_send,
                                    $stmt_to_id,
                                    $stmt_from_id,
                                    $stmt_identity );

                // Setup variables
                $stmt_subject = $model->getSubject();
                $stmt_message = $model->getMessage();

                $stmt_has_been_send = $model->getHasBeenSend();

                $stmt_to_id = $model->getToMail();
                $stmt_from_id = $model->getFromMail();

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
                throw new Exception( "Error: " . $ex );
            }
            finally
            {
                // Leaves the connection.
                $this->getWrapper()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @param $id
         * @return bool
         * @throws Exception
         */
        final public function updateIsFinished( $id ):bool
        {
            $retVal = null;

            $sql = "UPDATE contact SET has_been_send = ? WHERE identity = ?;";

            $stmt_has_been_send = null;
            $stmt_identity = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii",
                    $stmt_has_been_send,
                    $stmt_identity );

                $stmt_has_been_send = 1;
                $stmt_identity = $id;

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
                throw new Exception( "Error: " . $ex );
            }
            finally
            {
                // Leaves the connection.
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

            $table_name = self::getTableName();
            $sql = "SELECT count( * ) AS number_of_rows FROM {$table_name};";

            // Opens a connection to the database
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

            if( BaseFactoryTemplate::modelImplements( $classObject, self::getViewName() ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            return boolval( $retVal );
        }

    }

?>