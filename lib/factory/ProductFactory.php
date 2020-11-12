<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * 
     */
    class ProductFactory 
        extends Factory
    {
        /**
         * 
         */
        function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }


        /**
         * 
         */
        final public function get( )
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
            $sql = "select * from product limit ? offset ?;";

            // prepare statement variables
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

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $productModel = new ProductModel( $this );

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

            //
            $this->getConnector()->disconnect();

            return $retVal;
        }


        /**
         * 
         */
        final public function create( $model )
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            // return array
            $retVal = null;

            // sql, that the prepared statement uses
            $sql = "insert into product( title, product_description, product_price ) values( ?, ?, ? );";

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

            //
            $this->getConnector()->disconnect();

            return $retVal;
        }


        /**
         * 
         */
        final public function update( $model )
        {

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            // return array
            $retVal = null;

            // sql, that the prepared statement uses
            $sql = "update product set title = ?, product_description = ?, product_price = ? where identity = ?;";

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

            //
            $this->getConnector()->disconnect();

            return $retVal;
        }


        /**
         * 
         */
        final public function delete( $model )
        {
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