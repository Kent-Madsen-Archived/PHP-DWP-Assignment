<?php
    /**
     *  Title: ProductFactory
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ProductFactory
     */
    class ProductFactory
        extends BaseFactoryTemplate
    {
        /**
         * ProductFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( ?MySQLConnectorWrapper $mysql_connector )
        {
            $this->setupBase();
            $this->setWrapper( $mysql_connector );
            $this->setPaginationAndLimit(CONSTANT_FIVE, CONSTANT_ZERO);
        }

        private const table_name = 'product';

        private const field_identity    = 'identity';

        private const field_title       = 'title';
        private const field_description = 'description';
        private const field_price       = 'price';


        /**
         * @return string
         */
        final public static function getTableName()
        {
            return self::table_name;
        }


        /**
         * @return mixed|string
         */
        final public function getFactoryTableName(): string
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
        final public function exist(): bool
        {
            $status_factory = new StatusOnFactory( $this->getWrapper() );
            
            $database = $this->getWrapper()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::getTableName() );
            
            return boolval( $value );
        }


        /**
         * @return ProductModel
         * @throws Exception
         */
        final public function createModel(): ProductModel
        {
            $model = new ProductModel( $this );
            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        final public function validateAsValidModel( $var ): bool
        {
            $retVal = false;

            if( $var instanceof ProductModel )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return array|null
         * @throws Exception
         */
        final public function read(): ?array
        {
            // return array
            $retVal = null;

            $tn = self::table_name;

            // sql, that the prepared statement uses
            $sql = "SELECT * FROM {$tn} LIMIT ? OFFSET ?;";

            // prepare statement variables
            $stmt_limit  = null;
            $stmt_offset = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii",
                                    $stmt_limit,
                                    $stmt_offset );

                $stmt_limit  =  $this->getLimitValue();
                $stmt_offset =  $this->CalculateOffset();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $productModel = $this->createModel();

                        $productModel->setIdentity( self::Int10( $row[ self::field_identity ] ) );
                        
                        $productModel->setTitle( strval(  $row[ self::field_title ] ) );
                        $productModel->setDescription( strval( $row[ self::field_description ] ) );
                        $productModel->setPrice( doubleval( $row[ self::field_price ] ) );

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
                $this->getWrapper()->disconnect();
            }

            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        final public function readModel( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
            $retVal = false;

            // sql, that the prepared statement uses
            $tn = self::table_name;
            $tfi = self::field_identity;

            $sql = "SELECT * FROM {$tn} WHERE {$tfi} = ?;";

            // prepare statement variables
            $stmt_identity  = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "i",
                    $stmt_identity );

                $stmt_identity  = self::Int10( $model->getIdentity() );

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model->setIdentity( self::Int10( $row[ self::field_identity ] ) );

                        $model->setTitle( strval(  $row[ self::field_title ] ) );
                        $model->setDescription( strval( $row[ self::field_description ] ) );
                        $model->setPrice( doubleval( $row[ self::field_price ] ) );

                        $retVal = true;
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
                $this->getWrapper()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @param $model
         * @return bool|mixed
         * @throws Exception
         */
        final public function create( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // return array
            $retVal = null;

            $tn = self::table_name;

            $tft = self::field_title;
            $tfd = self::field_description;
            $tfp = self::field_price;

            // sql, that the prepared statement uses
            $sql = "INSERT INTO {$tn} ( {$tft}, {$tfd}, {$tfp} ) VALUES( ?, ?, ? );";

            // prepare statement variables
            $stmt_title         = null;
            $stmt_description   = null;

            $stmt_price         = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ssd", $stmt_title, $stmt_description, $stmt_price );

                $stmt_title         = $model->getTitle();
                $stmt_description   = $model->getDescription() ;

                $stmt_price         = $model->getPrice();


                $stmt->execute();

                $model->setIdentity( $this->getWrapper()->finishCommitAndRetrieveInsertId( $stmt ) );
                $retVal = true;
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error: ' . $ex );
            }
            finally
            {
                $this->getWrapper()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @param $model
         * @return mixed
         * @throws Exception
         */
        final public function update( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // return array
            $retVal = false;

            // sql, that the prepared statement uses
            $tn = self::table_name;
            $tfi = self::field_identity;

            $tft = self::field_title;
            $tfd = self::field_description;
            $tfp = self::field_price;

            $sql = "UPDATE {$tn} SET {$tft} = ?, {$tfd} = ?, {$tfp} = ? WHERE {$tfi} = ?;";

            // prepare statement variables
            $stmt_identity      = null;

            $stmt_title         = null;
            $stmt_description   = null;
            $stmt_price         = null;

            // Opens an connection
            $connection = $this->getWrapper()->connect();

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
                
                $stmt_price         = doubleval( $model->getPrice() );

                $stmt_identity      = self::Int10( $model->getIdentity() );

                $stmt->execute();

                // commits the statement
                $this->getWrapper()->finish();
                $retVal = true;
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error: ' . $ex );
            }
            finally
            {
                //
                $this->getWrapper()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @param $model
         * @return bool|mixed
         * @throws Exception
         */
        final public function delete( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
            $retVal = false;

            $tn = self::table_name;
            $tfi = self::field_identity;

            $sql = "DELETE FROM {$tn} WHERE {$tfi} = ?;";

            $stmt_identity = null;

            $connection = $this->getWrapper()->connect();

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
         * @return int
         * @throws Exception
         */
        final public function length(): int
        {
            $retVal = CONSTANT_ZERO;
            
            $tn = self::table_name;
            $sql = "SELECT count( * ) AS number_of_rows FROM {$tn};";

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
                        $retVal = self::Int10( $row[ 'number_of_rows' ]);
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
         * @param array $filter
         * @return mixed|void
         */
        public final function lengthCalculatedWithFilter( array $filter )
        {
            // TODO: Implement lengthCalculatedWithFilter() method.
        }


        /**
         * @return string
         */
        public final function appendices(): string
        {
            // TODO: Implement appendices() method.
            return "";
        }


        /**
         * @param array $filters
         * @return bool
         */
        public final function insertOptions(array $filters): bool
        {
            // TODO: Implement insertOptions() method.
            return false;
        }


    }

?>