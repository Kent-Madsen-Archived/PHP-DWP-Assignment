<?php
    class ProductVariationFactory
    {
        public function __construct( MySQLConnectorWrapper $wrapper )
        {
            $this->setWrapper($wrapper);
        }

        public function makeVariation($product_a, $product_b): bool
        {
            // return array
            $retVal = false;

            // sql, that the prepared statement uses
            $sql = "call insert_product_variation(?, ?);";

            // prepare statement variables
            $stmt_a  = null;
            $stmt_b = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii",
                    $stmt_a,
                    $stmt_b );

                $stmt_a  =  $product_a;
                $stmt_b =  $product_b;

                $stmt->execute();
                $this->getWrapper()->finish();

                $retVal = true;
            }
            catch( Exception $ex )
            {
                $this->getWrapper()->undoState();
                throw new Exception( 'Error: ' . $ex );
            }
            finally
            {
                //
                $this->getWrapper()->disconnect();
            }

            return $retVal;
        }

        public function readVariationByProductId( $product_id ): ?array
        {
            // return array
            $retVal = null;

            // sql, that the prepared statement uses
            $sql = "SELECT * FROM product_variation where product_main_id = ?";

            // prepare statement variables
            $stmt_product_id  = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "i",
                    $stmt_product_id );

                $stmt_product_id = $product_id;

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $productModel = new ProductVariationModel();

                        $productModel->setIdentity($row['identity']);
                        $productModel->setProductMainId($row['product_main_id']);
                        $productModel->setProductVariantOfId($row['product_variant_of_id']);

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


        private $wrapper = null;

        /**
         * @param MySQLConnectorWrapper $wrapper
         */
        public function setWrapper( MySQLConnectorWrapper $wrapper): void
        {
            $this->wrapper = $wrapper;
        }

        /**
         * @return MySQLConnectorWrapper
         */
        public function getWrapper(): MySQLConnectorWrapper
        {
            return $this->wrapper;
        }
    }
?>