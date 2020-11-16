<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * Class PersonNameFactory
     */
    class PersonNameFactory 
        extends FactoryTemplate
    {
        /**
         * @return string
         */
        final public static function getTableName()
        {
            return 'person_name';
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
            return 'PersonNameView';
        }


        /**
         * @return string
         */
        final public static function getControllerName()
        {
            return 'PersonNameController';
        }


        /**
         * PersonNameFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( $mysql_connector )
        {   
            $this->setConnector( $mysql_connector );
        }


        /**
         * @return bool|mixed
         * @throws Exception
         */
        final public function exist()
        {
            $status_factory = new StatusFactory( $this->getConnector() );
            
            $database = $this->getConnector()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::getTableName() );
            
            return boolval( $value );
        }


        /**
         * @return mixed|PersonNameModel
         */
        final public function createModel()
        {
            $model = new PersonNameModel( $this );

            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        final public function validateAsValidModel( $var )
        {
            $retVal = false;

            if( $var instanceof PersonNameModel )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return array|mixed|null
         * @throws Exception
         */
        final public function read()
        {
            $retVal = null;

            $sql = "SELECT * FROM person_name LIMIT ? OFFSET ?;";

            $stmt_limit  = null;
            $stmt_offset = null;

            $connection = $this->getConnector()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii",
                                    $stmt_limit,
                                    $stmt_offset );

                $stmt_limit  = $this->getLimit();
                $stmt_offset = $this->calculateOffset();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $model = $this->createModel();
                        
                        $model->setIdentity( $row[ 'identity' ] );
                        
                        $model->setFirstName( $row[ 'first_name' ] );
                        $model->setLastName( $row[ 'last_name' ] );
                        $model->setMiddleName( $row[ 'middle_name' ] );

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
        final public function read_model( &$model )
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
        final public function create( &$model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = null;

            $sql = "INSERT INTO person_name( first_name, last_name, middle_name ) VALUES( ?, ?, ? );";

            $stmt_first_name    = null;
            $stmt_last_name     = null;
            $stmt_middle_name   = null;

            $connection = $this->getConnector()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );
                
                //
                $stmt->bind_param( "sss", 
                                    $stmt_first_name, 
                                    $stmt_last_name,
                                    $stmt_middle_name );

                //
                $stmt_first_name    = $model->getFirstName();
                $stmt_last_name     = $model->getLastName();
                $stmt_middle_name   = $model->getMiddleName();

                // Executes the query
                $stmt->execute();

                $model->setIdentity( $this->getConnector()->finish_insert( $stmt ) );
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
            
            return boolval( $retVal );
        }


        /**
         * @param $model
         * @return mixed
         * @throws Exception
         */
        final public function update( &$model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
            $retVal = false;

            $sql = "UPDATE person_name SET first_name = ?, last_name = ?, middle_name = ? WHERE identity = ?;";

            $stmt_first_name = null;
            $stmt_last_name = null;
            $stmt_middle_name = null;

            $stmt_identity = null;

            $connection = $this->getConnector()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                //
                $stmt->bind_param( "sssi",
                                    $stmt_first_name,
                                    $stmt_last_name,
                                    $stmt_middle_name,
                                    $stmt_identity );

                //
                $stmt_first_name = $model->getFirstName();
                $stmt_last_name = $model->getLastName();
                $stmt_middle_name = $model->getMiddleName();

                $stmt_identity = $model->getIdentity();

                // Executes the query
                $stmt->execute();

                // commits the statement
                $this->getConnector()->finish();

                $retVal = true;
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

            return boolval($retVal);
        }


        /**
         * @param $model
         * @return bool|mixed
         * @throws Exception
         */
        final public function delete( &$model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
            $retVal = null;

            $sql = "DELETE FROM person_name WHERE identity = ?;";

            $stmt_identity = null;

            $connection = $this->getConnector()->connect();

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

                $retVal = true;
            }
            catch( Exception $ex )
            {
                $retVal = false;

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
            $retVal = CONSTANT_ZERO;

            $sql = "SELECT count( * ) AS number_of_rows FROM " . self::getTableName() . ";";

            $connection = $this->getConnector()->connect();

            try 
            {
                $stmt = $connection->prepare( $sql );
                
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

            if( FactoryTemplate::ModelImplements( $classObject, self::getControllerName() ) )
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

            if( FactoryTemplate::ModelImplements( $classObject, self::getViewName() ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            return boolval( $retVal );
        }

    }

?>