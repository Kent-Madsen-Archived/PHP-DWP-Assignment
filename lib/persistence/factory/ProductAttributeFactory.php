<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    class ProductAttributeFactory 
        extends Factory
    {
        /**
         * 
         */
        function __construct( $mysql_connector )
        {
            if( !$this->validateAsValidConnector( $mysql_connector ) )
            {
                throw new Exception( 'Not a valid connector' );
            }
            
            $this->setConnector( $mysql_connector );
        }

        final public function createModel()
        {
            $model = new ProductAttributeModel( $this );

            return $model;
        }

        final public function setup()
        {
            
        }

        final public function setupSecondaries()
        {
            
        }

        final public function exist_database()
        {
            
        }

        /**
         * 
         */
        final public function validateAsValidModel( $var )
        {
            if( $var instanceof ProductAttributeModel )
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

            $sql = "SELECT * FROM product_attribute LIMIT ? OFFSET ?;";

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
                        $model->setContent( $row['content'] );

                        array_push( $retVal, $model );
                    }
                }
            }
            catch( Exception $ex )
            {
                echo $ex;
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
        final public function create( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

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

            $sql = "DELETE FROM product_attribute WHERE identity = ?;";

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

                echo $ex;
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getConnector()->disconnect();
            }

            return $retVal;
        }
    }

?>