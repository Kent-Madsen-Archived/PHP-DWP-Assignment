<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * Class ProductFactory
     */
    class ProductFactory 
        extends FactoryTemplate
    {
        /**
         * ProductFactory constructor.
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
        final public static function getTableName()
        {
            return 'product';
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
            return 'ProductView';
        }


        /**
         * @return string
         */
        final public static function getControllerName()
        {
            return 'ProductController';
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
         * @return ProductModel
         */
        final public function createModel()
        {
            $model = new ProductModel( $this );

            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        final public function validateAsValidModel( $var )
        {
            $retVal = false;

            if( $var instanceof ProductModel )
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
            // return array
            $retVal = null;

            // sql, that the prepared statement uses
            $sql = "SELECT * FROM product LIMIT ? OFFSET ?;";

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
                        $productModel = $this->createModel();

                        $productModel->setIdentity( $row[ 'identity' ] );
                        
                        $productModel->setTitle( $row[ 'title' ] );
                        $productModel->setDescription( $row[ 'product_description' ] );
                        $productModel->setPrice( $row[ 'product_price' ] );

                        array_push( $retVal, $productModel );
                    }
                }
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error: ' . $ex );
            }
            finally
            {
                //
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
         * @return bool|mixed
         * @throws Exception
         */
        final public function create( &$model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // return array
            $retVal = null;

            // sql, that the prepared statement uses
            $sql = "INSERT INTO product( title, product_description, product_price ) VALUES( ?, ?, ? );";

            // prepare statement variables
            $stmt_title         = null;
            $stmt_description   = null;
            $stmt_price         = null;

            $connection = $this->getConnector()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ssd",
                                    $stmt_title,
                                    $stmt_description,
                                    $stmt_price );

                $stmt_title         = $model->getTitle();
                $stmt_description   = $model->getDescription();
                $stmt_price         = $model->getPrice();

                $stmt->execute();

                $model->setIdentity( $this->getConnector()->finish_insert( $stmt ) );

                $retVal = true;
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
        final public function update( &$model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // return array
            $retVal = false;

            // sql, that the prepared statement uses
            $sql = "UPDATE product SET title = ?, product_description = ?, product_price = ? WHERE identity = ?;";

            // prepare statement variables
            $stmt_identity      = null;

            $stmt_title         = null;
            $stmt_description   = null;
            $stmt_price         = null;

            //
            $connection = $this->getConnector()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ssdi",
                                    $stmt_title,
                                    $stmt_description,
                                    $stmt_price,
                                    $stmt_identity );

                $stmt_title         = $model->getTitle();
                $stmt_description   = $model->getDescription();
                
                $stmt_price         = $model->getPrice();

                $stmt_identity      = $model->getIdentity();

                $stmt->execute();

                // commits the statement
                $this->getConnector()->finish();

                $retVal = true;
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error: ' . $ex );
            }
            finally
            {
                //
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
            
            $retVal = false;

            $sql = "DELETE FROM product WHERE identity = ?;";

            $stmt_identity = null;

            $connection = $this->getConnector()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );
                
                //
                $stmt->bind_param( "i",  
                                    $stmt_identity );

                // Sets Statement Variables
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

            return boolval( $retVal );
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