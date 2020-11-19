<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class BroughtFactory
     */
    class BroughtFactory
        extends FactoryTemplate
    {
        /**
         * BroughtFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( $mysql_connector )
        {
            $this->setWrapper( $mysql_connector );
            $this->setPaginationIndex(CONSTANT_ZERO);
            $this->setLimit(CONSTANT_ZERO);
        }


        /**
         * @return string
         */
        final public static function getTableName()
        {
            return 'brought_product';
        }


        /**
         * @return mixed|string
         */
        final public function getFactoryTableName():string
        {
            return self::getTableName();
        }

        /**
         * @return string
         */
        final public static function getViewName()
        {
            return 'BroughtProductView';
        }


        /**
         * @return string
         */
        final public static function getControllerName()
        {
            return 'BroughtProductController';
        }


        /**
         * @return BroughtProductModel|mixed
         */
        final public function createModel()
        {
            $model = new BroughtProductModel( $this );

            return $model;
        }


        /**
         * @return bool|mixed
         * @throws Exception
         */
        final public function exist(): bool
        {
            $status_factory = new StatusFactory( $this->getWrapper() );
            
            $database = $this->getWrapper()->getInformation()->getDatabase();
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

            if( $var instanceof BroughtProductModel )
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
            // sql, that the prepared statement uses
            $sql = "SELECT * FROM brought_product LIMIT ? OFFSET ?;";

            // prepare statement variables
            $stmt_limit  = null;
            $stmt_offset = null;

            // return array
            $retVal = null;

            // get a local connection
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );

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
                        $brought = $this->createModel();

                        $brought->setIdentity( $row[ 'identity' ] );
                        $brought->setInvoiceId( $row[ 'invoice_id' ] );
                        
                        $brought->setNumberOfProducts( $row[ 'number_of_products' ] );
                        
                        $brought->setPrice( $row[ 'price' ] );

                        $brought->setProductId( $row[ 'product_id' ] );
                        $brought->setRegistered( $row[ 'registered' ] );

                        array_push( $retVal, $brought );
                    }
                }
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error: ' . $ex );
            }
            finally
            {
                $this->getWrapper()->disconnect();
            }

            return $retVal;
        }


        /**
         * @param $model
         * @return mixed|null
         * @throws Exception
         */
        final public function readModel(&$model )
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
         * @return mixed|void
         * @throws Exception
         */
        final public function create( &$model ):bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }


            return false;
        }


        /**
         * @param $model
         * @return mixed|void
         * @throws Exception
         */
        final public function update( &$model ):bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            return false;
        }


        /**
         * @param $model
         * @return bool|mixed
         * @throws Exception
         */
        final public function delete( &$model ):bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $sql = "DELETE FROM brought_product WHERE identity = ?;";

            // Return value
            $retVal = false;

            // statement variables
            $stmt_identity = null;

            // opens a connection
            $local_connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $local_connection->prepare( $sql );
                
                //
                $stmt->bind_param( "i",  
                                    $stmt_identity );

                //
                $stmt_identity = $model->getIdentity();

                // Executes the query
                $stmt->execute();

                // commits the statement
                $this->getWrapper()->finish();

                $retVal = true;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getWrapper()->undoState();

                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getWrapper()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @return int|mixed
         * @throws Exception
         */
        final public function length(): int
        {
            $table_name = self::getTableName();
            $sql = "SELECT count( * ) AS number_of_rows FROM {$table_name};";

            $retVal = CONSTANT_ZERO;

            //
            $connection = $this->getWrapper()->connect();

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
                $this->getWrapper()->disconnect();
            }

            return intval( $retVal );
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