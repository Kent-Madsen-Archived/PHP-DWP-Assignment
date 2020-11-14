<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    class AssociatedCategoryFactory
        extends Factory
    {
        /**
         * 
         */
        final public static function getTableName()
        {
            return 'associated_category';
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
            $model = new AssociatedCategoryModel( $this );

            return $model;
        }


        /**
         * 
         */
        final public function validateAsValidModel( $var )
        {
            if( $var instanceof AssociatedCategoryModel )
            {
                return true;
            }

            return false;
        }


        /**
         * 
         */
        final public function read()
        {

            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "SELECT * FROM associated_category LIMIT ? OFFSET ?;";

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

                        $model->setProductAttributeId( $row[ 'product_attribute_id' ] );
                        $model->setProductCategoryId( $row[ 'product_category_id' ] );
                        
                        $model->setProductId( $row[ 'product_id' ] );


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
         * 
         */
        final public function read_model( $model )
        {
            $retVal = null;

            return $retVal;
        }

        
        /**
         * 
         */
        final public function create( $model )
        {
            
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

            $sql = "DELETE FROM associated_category WHERE identity = ?;";

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