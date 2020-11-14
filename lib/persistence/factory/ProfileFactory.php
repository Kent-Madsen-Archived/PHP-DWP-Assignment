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
        final public static function getTableName()
        {
            return 'profile';
        }
        

        /**
         * 
         */
        final public function getFactoryTableName()
        {
            return self::getTableName();
        }


        /**
         * 
         */
        public function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
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
         * TODO: This
         */
        final public function insert_base_data()
        {

        }


        /**
         * 
         */
        final public function exist_database()
        {
            $status_factory = new StatusFactory( $this->getConnector() );
            
            $database = $this->getConnector()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::getTableName() );
            
            return $value;     
        }


        /**
         * 
         */
        final public function createModel()
        {
            $model = new ProfileModel( $this );

            return $model;
        }


        /**
         * 
         */
        final public function validateAsValidModel( $var )
        {
            if( $var instanceof ProfileModel )
            {
                return true;
            }

            return false;
        }


        /**
         * 
         */
        final public function read( )
        {
            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "SELECT * FROM profile LIMIT ? OFFSET ?;";

            $stmt_limit  = null;
            $stmt_offset = null;

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii",
                                    $stmt_limit,
                                    $stmt_offset );

                $stmt_limit = $this->getLimit();
                $stmt_offset = $this->calculateOffset();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $Model = $this->createModel();

                        $Model->setIdentity( $row[ 'identity' ] );

                        $Model->setUsername( $row[ 'username' ] );

                        $Model->setPassword( $row[ 'password' ] );
                        $Model->setIsPasswordHashed( TRUE );

                        $Model->setProfileType( $row[ 'profile_type' ] );

                        array_push( $retVal, $Model );
                    }
                }
            }
            catch ( Exception $ex )
            {
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
         * 
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
         * 
         */
        final public function create( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "INSERT INTO profile( username, password, profile_type ) VALUES( ?, ?, ? );";

            $stmt_username = null;
            $stmt_password = null;

            $stmt_profile_type = null;

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
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

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

                throw new Exception( 'Error :' . $ex );
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
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
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
        final public function get_by_username( $username )
        {
            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "SELECT * FROM profile WHERE username = ?;";

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
                        $model->setIsPasswordHashed( TRUE );


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
        final public function validate_if_profile_type_is_admin( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = false;

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "SELECT is_admin( ? ) AS validation;";

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "i",
                                    $stmt_profile_type_idx );
                
                $stmt_profile_type_idx = $model->getProfileType();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        if( $row[ 'validation' ] )
                        {
                            $retVal = true;
                        }
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


        /**
         * 
         */
        final public function length()
        {
            $retVal = 0;

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

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

            return $retVal;
        }
    }

?>