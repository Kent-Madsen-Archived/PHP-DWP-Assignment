<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ContactFactory
     */
    class ContactFactory 
        extends Factory
    {
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
        final public function getFactoryTableName()
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
         * ContactFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }


        /**
         * @return ContactModel|mixed
         */
        final public function createModel()
        {
            $model = new ContactModel( $this );

            return $model;
        }
        

        /**
         * TODO: This
         */
        final public function setup()
        {
            
        }


        /**
         * TODO: This
         */
        final public function setupSecondaries()
        {
            
        }


        /**
         * @return bool|mixed
         * @throws Exception
         */
        final public function exist_database()
        {
            $status_factory = new StatusFactory( $this->getConnector() );
            
            $database = $this->getConnector()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::getTableName() );
            
            return $value;
        }


        /**
         * @param $var
         * @return bool
         */
        final public function validateAsValidModel( $var )
        {
            $retVal = false;

            if( $var instanceof ContactModel )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return array|mixed
         * @throws Exception
         */
        final public function read()
        {
            $retVal = array();

            $connection = $this->getConnector()->connect();

            $sql = "SELECT * FROM contact LIMIT ? OFFSET ?;";

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii", 
                                   $stmt_limit, 
                                   $stmt_offset );

                $stmt_limit = $this->getLimit();
                $stmt_offset = $this->calculateOffset();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model = $this->createModel();

                        $model->setIdentity( $row[ 'identity' ] );

                        $model->setSubject( $row[ 'subject_title' ] );
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
                $this->getConnector()->disconnect();
            }


            return $retVal;   
        }


        /**
         * @param $model
         * @return mixed|null
         * @throws Exception
         */
        final public function read_model( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = null;

            return $retVal;
        }


        /**
         * @param $model
         * @return mixed
         * @throws Exception
         */
        final public function create( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
            $retVal = null;

            $connection = $this->getConnector()->connect();

            $sql = "INSERT INTO contact( subject_title, message, has_been_send, to_id, from_id ) VALUES( ?, ?, ?, ?, ? );";

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
                $stmt_subject = $model->getSubject() ;
                $stmt_message = $model->getMessage();
                
                $stmt_has_been_send = $model->getHasBeenSend();

                $stmt_to_id   = $model->getToMail();
                $stmt_from_id = $model->getFromMail();
                
                // Executes the query
                $stmt->execute();

                // commits the statement
                $this->getConnector()->finish();

                // Apply Identity
                $model->setIdentity( $stmt->insert_id );
                $retVal = $model;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getConnector()->undo_state();

                throw new Exception( "Error: " . $ex );
            }
            finally 
            {
                // Leaves the connection.
                $this->getConnector()->disconnect();
            }

            return $retVal;
        }


        /**
         * @param $model
         * @return bool|mixed
         * @throws Exception
         */
        final public function delete( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = null;

            $connection = $this->getConnector()->connect();

            $sql = "DELETE FROM contact WHERE identity = ?;";

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
                $this->getConnector()->finish();

                $retVal = TRUE;
            }
            catch( Exception $ex )
            {
                $retVal = FALSE;

                // Rolls back, the changes
                $this->getConnector()->undo_state();

                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getConnector()->disconnect();
            }

            return $retVal;
        }


        /**
         * @param $model
         * @return mixed
         * @throws Exception
         */
        final public function update( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = null;

            $connection = $this->getConnector()->connect();

            $sql = "UPDATE contact SET subject_title = ?, message = ?, has_been_send = ?, to_id = ?, from_id = ? WHERE identity = ?;";

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
                $this->getConnector()->finish();

                $retVal = $model;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getConnector()->undo_state();

                throw new Exception( "Error: " . $ex );
            }
            finally
            {
                // Leaves the connection.
                $this->getConnector()->disconnect();
            }

            return $retVal;
        }


        /**
         * @return int|mixed
         * @throws Exception
         */
        final public function length()
        {
            $retVal = 0;

            $connection = $this->getConnector()->connect();

            $sql = "SELECT count( * ) AS number_of_rows FROM " . self::getTableName() . ";";

            try 
            {
                $stmt = $connection->prepare( $sql );
                
                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
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
                $this->getConnector()->undo_state();

                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                //
                $this->getConnector()->disconnect();
            }

            return intval( $retVal );
        }


        /**
         * @param $classObject
         * @return bool
         * @throws Exception
         */
        final public function classHasImplementedController( $classObject )
        {
            $retVal = false;

            if( is_null( $classObject ) )
            {
                throw new Exception('ArticleFactory - Static Function - classHasImplementedController, classObject is null, function only accepts classes');
            }

            if( !is_object( $classObject ) )
            {
                throw new Exception('ArticleFactory - Static Function - classHasImplementedController, classObject is not a object. function only accepts classes.');
            }

            if( Factory::modelImplements( $classObject, self::getControllerName() ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            return boolval( $retVal );
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

            if( Factory::modelImplements( $classObject, self::getViewName() ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            return boolval( $retVal );
        }

    }

?>