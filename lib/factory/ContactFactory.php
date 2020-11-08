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
            $this->setConnector( $mysql_connector );
        }

        // Useful when implementing pagination
        private $pagination_index = 0;
        private $limit = 5;

        /**
         * 
         */
        public function getRequest()
        {
            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "select * from contact;";

            $result = $connection->query( $sql );

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

            $this->getConnector()->disconnect();

            return $retVal;
        }

        /**
         * 
         */
        public function create( $model )
        {
            $retVal = null;

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "INSERT INTO contact(subject_title, message, has_been_send, to_id, from_id) VALUES(?, ?, ?, ?, ?);";

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

        public function deleteRequestById( $identity )
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "delete from contact where identity = ?;";

            try 
            {
                //
                $stmt = $connection->prepare( $sql );
                $stmt->bind_param( 'i', $identity );

                $stmt->execute();

                // commits the statement
                $this->getConnector()->finish();
                
            }
            catch( Exception $ex )
            {                
                // Rolls back, the changes
                $this->getConnector()->undo_state();

                echo "Ex: " . $ex;
            }
            finally
            {
                $this->getConnector()->disconnect();
            }

            //
        }

        /**
         * 
         */
        public function delete( $model )
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            //

            $this->getConnector()->disconnect();
        }

        /**
         * 
         */
        public function update( $model )
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            //

            
            $this->getConnector()->disconnect();
        }


        // Accessors

        /**
         * 
         */
        public function getPaginationIndex()
        {
            return $this->pagination_index;
        }

        /**
         * 
         */
        public function getLimit()
        {
            return $this->limit;
        }

        /**
         * 
         */
        public function setPaginationIndex( $idx )
        {
            $this->pagination_index = $idx;
        }

        /**
         * 
         */
        public function setLimit($var)
        {
            $this->limit = $var;
        }

    }

?>