<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * 
     */
    class PersonEmailFactory 
        extends Factory
    {
        /**
         * 
         */
        function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }

        /**
         * 
         */
        public function create( $model )
        {
            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "INSERT INTO person_email( content ) VALUES( ? );";

            try
            {
                $stmt = $connection->prepare( $sql );
                
                //
                $stmt->bind_param( "s", 
                                    $stmt_email );

                //
                $stmt_email = $model->getContent();

                // Executes the query
                $stmt->execute();

                // commits the statement
                $this->getConnector()->finish();

                $model->setIdentity( $stmt->insert_id );
                $retVal = $model;
            }
            catch( Exception $ex )
            {
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


        //
        public function get()
        {
            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            try
            {
                $sql = "select * from person_email;";

                $result = $connection->query( $sql );

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model = new PersonEmailModel( $this );
                        
                        $model->setIdentity( $row['identity'] );
                        $model->setContent( $row['content'] );

                        array_push( $retVal, $model );
                    }
                }
            }
            catch( Exception $ex )
            {
                echo $ex;
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getConnector()->disconnect();
            }
            
            return $retVal;
        }

        public function get_by_name( $email )
        {
            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "select * from person_email where content = ?;";

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "s", $email );
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model = new PersonEmailModel( $this );
                        
                        $model->setIdentity( $row['identity'] );
                        $model->setContent( $row['content'] );

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
                $this->getConnector()->disconnect();
            }
            
            return $retVal;
        }

    }

?>