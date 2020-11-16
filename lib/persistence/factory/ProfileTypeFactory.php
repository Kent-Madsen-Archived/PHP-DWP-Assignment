<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * Class ProfileTypeFactory
     */
    class ProfileTypeFactory 
        extends Factory 
    {
        /**
         * @return string
         */
        final public static function getTableName()
        {
            return 'profile_type';
        }


        /**
         * @return mixed|string
         */
        final public function getFactoryTableName()
        {
            return strval( self::getTableName() );
        }


        /**
         * ProfileTypeFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }

        /**
         * @return string
         */
        final public static function getViewName()
        {
            return 'ProfileTypeView';
        }


        /**
         * @return string
         */
        final public static function getControllerName()
        {
            return 'ProfileTypeController';
        }


        /**
         * TODO: setup
         */
        final public function setup()
        {
            
        }


        /**
         * TODO: setupSecondaries
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
            
            return boolval( $value );
        }


        /**
         * @return mixed|ProfileTypeModel
         * @throws Exception
         */
        final public function createModel()
        {
            $model = new ProfileTypeModel( $this );

            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        final public function validateAsValidModel( $var )
        {
            $retVal = false;

            if( $var instanceof ProfileTypeModel )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return array|mixed
         * @throws Exception
         */
        final public function read( )
        {
            $retVal = array();

            $connection = $this->getConnector()->connect();

            $sql = "SELECT * FROM profile_type LIMIT ? OFFSET ?;";

            $stmt_limit = null;
            $stmt_offset = null;

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
                        $model->setContent( $row[ 'content' ] );

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

            $retVal = array();

            $connection = $this->getConnector()->connect();

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

            $retVal = array();

            $connection = $this->getConnector()->connect();

            $sql = "UPDATE profile_type SET content = ? WHERE identity = ?;";

            try
            {
                $stmt = $connection->prepare( $sql );

                //
                $stmt->bind_param( "si",
                                    $stmt_profile_type_content,
                                    $stmt_identity );

                //
                $stmt_profile_type_content = $model->getContent();

                $stmt_identity = $model->getIdentity();

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

            $sql = "DELETE FROM profile_type WHERE identity = ?;";

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
         * @return int|mixed
         * @throws Exception
         */
        final public function length()
        {
            $retVal = ZERO;

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