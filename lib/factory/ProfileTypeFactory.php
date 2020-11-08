<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * 
     */
    class ProfileTypeFactory 
        extends Factory 
    {
        /**
         * 
         */
        function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }

        // CRUD implementation
        public function create( $model )
        {
            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "INSERT INTO profile_type( content ) VALUES( ? );";

            try
            {
                $stmt = $connection->prepare( $sql );
                
                //
                $stmt->bind_param( "s", 
                                    $stmt_profile_type_content );

                //
                $stmt_profile_type_content = $model->getContent();

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