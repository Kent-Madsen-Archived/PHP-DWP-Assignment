<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
      * 
      */
    class ContactFactory 
        extends Factory
    {
        /**
         * 
         */
        function __construct( $mysql_connector )
        {
            if( !$this->validateAsValidConnector( $mysql_connector ) )
            {
                throw new Exception( 'Not a valid connector' );
            }
            
            $this->setConnector( $mysql_connector );
        }


        /**
         * 
         */
        final public function get()
        {
            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "select * from contact LIMIT ? OFFSET ?;";

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
                        $model = null;

                        $model = new ContactModel( $this );

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
                
            }

            $this->getConnector()->disconnect();

            return $retVal;   
        }


        /**
         * 
         */
        final public function create( $model )
        {
            $retVal = null;

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

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
                $stmt_subject = $model->getSubject();
                $stmt_message = $model->getMessage();
                
                $stmt_has_been_send = $model->getHasBeenSend();

                $stmt_to_id = $model->getToMail();
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
         * 
         */
        final public function delete( $model )
        {
            $retVal = null;

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

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

                echo $ex;
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getConnector()->disconnect();
            }

            return $retVal;
        }

        
        /**
         * 
         */
        final public function update( $model )
        {
            $retVal = null;

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

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

    }

?>