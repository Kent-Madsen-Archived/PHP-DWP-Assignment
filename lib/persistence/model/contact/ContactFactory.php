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
    class ContactFactory
        extends BaseFactoryTemplate
    {
        public const table = 'contact';
        public const view_model = 'contact_model_view';

        public const field_identity = 'identity';

        public const field_title    = 'title';
        public const field_message  = 'message';

        public const field_has_been_send = 'has_been_send';

        public const field_to_id    = 'to_id';
        public const field_from_id  = 'from_id';

        public const view_field_to = 'to_mail';
        public const view_field_from = 'from_mail';


        public const field_created_on = 'created_on';


        /**
         * ContactFactory constructor.
         * @param MySQLConnectorWrapper|null $mysql_connector
         * @throws Exception
         */
        public function __construct( ?MySQLConnectorWrapper $mysql_connector )
        {
            $this->setupBase();
            $this->setWrapper( $mysql_connector );
            $this->setPaginationAndLimit( CONSTANT_FIVE, CONSTANT_ZERO );
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
        public final function getFactoryTableName():string
        {
            return self::table;
        }


        /**
         * @return ContactModel
         * @throws Exception
         */
        public final function createModel(): ContactModel
        {
            $model = new ContactModel( $this );
            return $model;
        }


        /**
         * @return ContactModelForm
         */
        public final function createFormModel(): ContactModelForm
        {
            $model = new ContactModelForm();
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

            if( $var instanceof ContactModel )
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
            // Return value
            $retVal = null;

            // SQL Query
            $table = self::table;
            $sql = "SELECT * FROM {$table} LIMIT ? OFFSET ?;";

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

                $stmt_limit = $this->getLimitValue();
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

                        $model->setSubject( $row[ self::field_title ] );
                        $model->setMessage( $row[ self::field_message ] );

                        $model->setToMail( $row[ self::field_to_id ] );
                        $model->setFromMail( $row[ self::field_from_id ] );

                        $model->setCreatedOn( $row[ self::field_created_on ] );
                        $model->setHasBeenSend( $row[ self::field_has_been_send ] );

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
        public final function readFormsNotSended(): ?array
        {
            // Return value
            $retVal = null;

            // SQL Query
            $view = self::view_model;
            $fhbs = self::field_has_been_send;

            $sql = "SELECT * FROM {$view} WHERE {$fhbs} = 0 LIMIT ? OFFSET ?;";

            //
            $stmt_limit  = null;
            $stmt_offset = null;

            // opens a connection to the database
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii",
                                    $stmt_limit,
                                    $stmt_offset );

                $stmt_limit = $this->getLimitValue();
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

                        $model->setIdentity( $row[ self::field_identity ] );

                        $model->setTitle( $row[ self::field_title ] );
                        $model->setMessage( $row[ self::field_message ] );

                        $model->setToEmail( $row[ self::view_field_to ] );
                        $model->setFromEmail( $row[ self::view_field_from ] );

                        $model->setCreatedOn( $row[ self::field_created_on ] );
                        $model->setHasBeenSend( $row[ self::field_has_been_send ] );

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
        public final function readModel( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // Return value
            $retVal = null;

            // SQL Query
            $table = self::table;
            $fid = self::field_identity;

            $sql = "SELECT * FROM {$table} WHERE {$fid} = ?;";

            //
            $stmt_identity = null;

            // opens a connection to the database
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "i",
                    $stmt_identity );

                $stmt_identity =  $model->getIdentity();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model->setIdentity( $row[ self::field_identity ] );

                        $model->setSubject( $row[ self::field_title ] );
                        $model->setMessage( $row[ self::field_message ] );

                        $model->setToMail( $row[ self::field_to_id ] );
                        $model->setFromMail( $row[ self::field_from_id ] );

                        $model->setCreatedOn( $row[ self::field_created_on ] );
                        $model->setHasBeenSend( $row[ self::field_has_been_send ] );

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
            
            $retVal = false;

            $table = self::table;
            $ft = self::field_title;
            $fm = self::field_message;

            $fhbs = self::field_has_been_send;

            $ftid = self::field_to_id;
            $ffid = self::field_from_id;

            $sql = "INSERT INTO {$table}( {$ft}, {$fm}, {$fhbs}, {$ftid}, {$ffid} ) VALUES( ?, ?, ?, ?, ? );";

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

            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        public final function delete( &$model ):bool
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

            $retVal = null;

            $table = self::table;
            $ft = self::field_title;
            $fm = self::field_message;

            $fhbs = self::field_has_been_send;

            $ftid = self::field_to_id;
            $ffid = self::field_from_id;

            $fid = self::field_identity;

            $sql = "UPDATE {$table} SET {$ft} = ?, {$fm} = ?, {$fhbs} = ?, {$ftid} = ?, {$ffid} = ? WHERE {$fid} = ?;";

            $stmt_subject = null;
            $stmt_message = null;

            $stmt_has_been_send = null;

            $stmt_to_id     = null;
            $stmt_from_id   = null;

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

                $stmt_to_id     = $model->getToMail();
                $stmt_from_id   = $model->getFromMail();

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

            return $retVal;
        }


        /**
         * @param $id
         * @return bool
         * @throws Exception
         */
        public final function updateIsFinished( $id ): bool
        {
            $retVal = null;

            $table = self::table;

            $fhbs = self::field_has_been_send;
            $fid = self::field_identity;

            $sql = "UPDATE {$table} SET {$fhbs} = ? WHERE {$fid} = ?;";

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

            return $retVal;
        }


        /**
         * @param array $filter
         * @return mixed|void
         */
        public final function lengthCalculatedWithFilter(array $filter): ?int
        {
            // TODO: Implement length_calculate_with_filter() method.
            return null;
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
        public function clearOptions(): void
        {
            // TODO: Implement clearOptions() method.
        }


    }

?>