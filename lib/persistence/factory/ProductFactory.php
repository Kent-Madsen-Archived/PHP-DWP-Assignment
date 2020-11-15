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
        extends Factory
    {
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
         * ProductFactory constructor.
         * @param $mysql_connector
         * @throws Exception
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
         * @return bool|mixed
         * @throws Exception
         */
        final public function exist_database()
        {
            $status_factory = new StatusFactory( $this->getConnector() );
            
            $database = $this->getConnector()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::getTableName() );
            
            return $value;         
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
            if( $var instanceof ProductModel )
            {
                return true;
            }

            return false;
        }


        /**
         * @return array|mixed
         * @throws Exception
         */
        final public function read( )
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            // return array
            $retVal = array();

            // sql, that the prepared statement uses
            $sql = "SELECT * FROM product LIMIT ? OFFSET ?;";

            // prepare statement variables
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

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            // return array
            $retVal = null;

            // sql, that the prepared statement uses
            $sql = "INSERT INTO product( title, product_description, product_price ) VALUES( ?, ?, ? );";

            // prepare statement variables
            $stmt_title         = null;
            $stmt_description   = null;
            $stmt_price         = null;

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

                // commits the statement
                $this->getConnector()->finish();

                $model->setIdentity( $stmt->insert_id );
                $retVal = $model;
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
         * @return mixed
         * @throws Exception
         */
        final public function update( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            // return array
            $retVal = null;

            // sql, that the prepared statement uses
            $sql = "UPDATE product SET title = ?, product_description = ?, product_price = ? WHERE identity = ?;";

            // prepare statement variables
            $stmt_identity      = null;

            $stmt_title         = null;
            $stmt_description   = null;
            $stmt_price         = null;

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

                $retVal = $model;
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

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "DELETE FROM product WHERE identity = ?;";
            $stmt_identity = null;

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