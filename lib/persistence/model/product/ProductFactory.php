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
        public const table_name = 'product';

        public const field_identity    = 'identity';

        public const field_title       = 'title';
        public const field_description = 'description';
        public const field_price       = 'price';


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


        /**
         * @return string
         */
        public final static function getTableName(): string
        {
            return self::table_name;
        }


        /**
         * @return string
         */
        public final function getFactoryTableName(): string
        {
            return self::table_name;
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function exist(): bool
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
        public final function createModel(): ProductModel
        {
            $model = new ProductModel( $this );
            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        public final function validateAsValidModel( $var ): bool
        {
            $retVal = false;

            if( $var instanceof ProductModel )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return array|null
         * @throws Exception
         */
        public final function read(): ?array
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

                        $productModel->setIdentity( $row[ self::field_identity ] );
                        
                        $productModel->setTitle(  $row[ self::field_title ] );
                        $productModel->setDescription( $row[ self::field_description ] );
                        $productModel->setPrice( $row[ self::field_price ] );

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
        public final function readModel( &$model ): bool
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

                $stmt_identity  = $model->getIdentity();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model->setIdentity( $row[ self::field_identity ] );

                        $model->setTitle( $row[ self::field_title ] );
                        $model->setDescription( $row[ self::field_description ] );
                        $model->setPrice( $row[ self::field_price ] );

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

            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        public final function create( &$model ): bool
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

            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        public final function update( &$model ): bool
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
                
                $stmt_price         = $model->getPrice();

                $stmt_identity      = $model->getIdentity();

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

            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        public final function delete( &$model ): bool
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

            return $retVal;
        }


        /**
         * @return int
         * @throws Exception
         */
        public final function length(): int
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

            return $retVal;
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


        /**
         *
         */
        public final function clearOptions(): void
        {
            // TODO: Implement clearOptions() method.
        }

    }

?>