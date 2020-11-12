<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * 
     */
    class ProfileFactory 
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
        final public function get( )
        {
            
        }


        /**
         * 
         */
        final public function create( $model )
        {
            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "INSERT INTO profile( username, password, profile_type ) VALUES( ?, ?, ? );";

            try
            {
                $stmt = $connection->prepare( $sql );
                
                //
                $stmt->bind_param( "ssi", 
                                    $stmt_username, 
                                    $stmt_password,
                                    $stmt_profile_type );

                //
                $stmt_username = $model->getUsername();
                $stmt_password = $model->getPassword();

                $stmt_profile_type = $model->getProfileType();

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

            $sql = "UPDATE profile SET username = ?, password = ?, profile_type = ? WHERE identity = ?;";

            $stmt_identity = null;

            $stmt_username = null;
            $stmt_password = null;

            $stmt_profile_type = null;

            try
            {
                $stmt = $connection->prepare( $sql );

                //
                $stmt->bind_param( "ssii",
                    $stmt_username,
                    $stmt_password,
                    $stmt_profile_type,
                    $stmt_identity );

                //
                $stmt_identity = $model->getIdentity();

                $stmt_username = $model->getUsername();
                $stmt_password = $model->getPassword();

                $stmt_profile_type = $model->getProfileType();

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
        final public function delete( $model )
        {
            $retVal = null;

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "DELETE FROM profile WHERE identity = ?;";

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

        public function get_by_username( $username )
        {

            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "Select * from profile where username = ?;";

            try
            {
                $stmt = $connection->prepare( $sql );
                
                //
                $stmt->bind_param( "s", 
                                    $stmt_username );

                $stmt_username = $username;

            
                // Executes the query
                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model = new ProfileModel( $this );

                        $model->setIdentity( $row[ 'identity' ] );
                        $model->setUsername( $row[ 'username' ] );
                        $model->setPassword( $row[ 'password' ] );
                        $model->setProfileType( $row[ 'profile_type' ] );
                        
                        array_push( $retVal, $model );
                    }
                }

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