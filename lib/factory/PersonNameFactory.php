<?php 

    /**
     * 
     */
    class PersonNameFactory 
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

            $sql = "INSERT INTO person_name(first_name, last_name, middle_name) VALUES(?, ?, ?);";

            try
            {
                $stmt = $connection->prepare( $sql );
                
                //
                $stmt->bind_param( "sss", 
                                    $stmt_first_name, 
                                    $stmt_last_name,
                                    $stmt_middle_name );

                //
                $stmt_first_name = $model->getFirstName();
                $stmt_last_name = $model->getLastName();
                $stmt_middle_name = $model->getMiddleName();

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


    }

?>