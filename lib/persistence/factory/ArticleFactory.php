<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ArticleFactory
     */
    class ArticleFactory 
        extends FactoryTemplate
    {
        /**
         * ArticleFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
            $this->setPaginationIndex(CONSTANT_ZERO);
            $this->setLimit(CONSTANT_ZERO);
        }


        /**
         * @return string
         */
        final public static function getViewName()
        {
            return 'ArticleView';
        }


        /**
         * @return string
         */
        final public static function getControllerName()
        {
            return 'ArticleController';
        }


        /**
         * @return string
         */
        final public static function getTableName()
        {
            return strval('article');
        }


        /**
         * @return mixed|string
         */
        final public function getFactoryTableName()
        {
            return strval( self::getTableName() );
        }


        /**
         * @return ArticleModel|mixed
         * @throws Exception
         */
        final public function createModel()
        {
            $model = new ArticleModel( $this );
            return $model;
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
         * @param $var
         * @return bool
         */
        final public function validateAsValidModel( $var )
        {
            $retVal = false;

            if( $var instanceof ArticleModel )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return array|mixed
         * @throws Exception
         */
        final public function read()
        {
            // return array
            $retVal = null;

            // sql, that the prepared statement uses
            $sql = "SELECT * FROM article LIMIT ? OFFSET ?;";

            // prepare statement variables
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
                $stmt_offset = $this->CalculateOffset();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();
                    
                    while( $row = $result->fetch_assoc() )
                    {
                        $articleModel = $this->createModel();
                        
                        $articleModel->setIdentity( $row[ 'identity' ] );
                        
                        $articleModel->setTitle( $row[ 'title' ] );
                        $articleModel->setContent( $row[ 'content' ] );

                        $articleModel->setCreatedOn( $row[ 'created_on' ] );
                        $articleModel->setLastUpdated( $row[ 'last_updated' ] );
    
                        array_push( $retVal, $articleModel );
                    }
                }    
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error: ' . $ex );
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
         * @return array
         * @throws Exception
         */
        final public function read_ordered_by_creation_date()
        {
            $connection = $this->getConnector()->connect();

            // sql, that the prepared statement uses
            $sql = "SELECT * FROM article ORDER BY created_on DESC LIMIT ? OFFSET ?;";

            // prepare statement variables
            $stmt_limit  = null;
            $stmt_offset = null;

            // return array
            $retVal = null;

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii", 
                                   $stmt_limit, 
                                   $stmt_offset );

                $stmt_limit = $this->getLimit();
                $stmt_offset = $this->CalculateOffset();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();
                    
                    while( $row = $result->fetch_assoc() )
                    {
                        $articleModel = $this->createModel();
                        
                        $articleModel->setIdentity( $row[ 'identity' ] );
                        
                        $articleModel->setTitle( $row[ 'title' ]  );
                        $articleModel->setContent( $row[ 'content' ]  );

                        $articleModel->setCreatedOn( $row[ 'created_on' ] );
                        $articleModel->setLastUpdated( $row[ 'last_updated' ] );
    
                        array_push( $retVal, $articleModel );
                    }
                }    
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error: ' . $ex );
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
        final public function create( &$model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // Statement Variables
            $stmt_title   = null;
            $stmt_content = null;

            // Return Values
            $retVal = false;

            $sql = "INSERT INTO article( title, article_content ) VALUES( ?, ? );";

            //
            $connection = $this->getConnector()->connect();

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ss", 
                                    $stmt_title, 
                                    $stmt_content );

                $stmt_title   = $model->getTitle();
                $stmt_content = $model->getContent();

                // Executes the query
                $stmt->execute();

                $model->setIdentity( $this->getConnector()->finish_insert( $stmt ) );
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
                throw new Exception('Not accepted model');
            }

            $sql = "UPDATE article SET title = ?, article_content = ? WHERE identity = ?";

            $stmt_title     = null;
            $stmt_content   = null;
            $stmt_identity  = null;

            // Return Value
            $retVal = false;

            //
            $connection = $this->getConnector()->connect();

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ssi", 
                                    $stmt_title, 
                                    $stmt_content, 
                                    $stmt_identity );

                $stmt_identity = $model->getIdentity();

                $stmt_title    = $model->getTitle();
                $stmt_content  = $model->getContent();

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

            return boolval( $retVal );
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

            // return value
            $retVal = false;

            // sql query
            $sql = "DELETE FROM article WHERE identity = ?;";

            // Statement Variables
            $stmt_identity = null;

            // opens a connection to the mysql database
            $local_connection = $this->getConnector()->connect();


            try 
            {
                $stmt = $local_connection->prepare( $sql );

                $stmt->bind_param( "i", 
                                    $stmt_identity );

                $stmt_identity = $model->getIdentity();

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

            return boolval( $retVal );
        }


        /**
         * @return int|mixed
         * @throws Exception
         */
        final public function length()
        {
            // SQL Query
            $table_name = self::getTableName();
            $sql = "SELECT count( * ) AS number_of_rows FROM {$table_name};";
            
            // Connection to the mysql Database
            $local_connection = $this->getConnector()->connect();

            // Return Value
            $retVal = CONSTANT_ZERO;

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
                throw new Exception( 'ArticleFactory - Static Function - classHasImplementedController, classObject is null, function only accepts classes' );
            }

            if( !is_object( $classObject ) )
            {
                throw new Exception( 'ArticleFactory - Static Function - classHasImplementedController, classObject is not a object. function only accepts classes.' );
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