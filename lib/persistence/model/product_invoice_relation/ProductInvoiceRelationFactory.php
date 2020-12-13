<?php

class ProductInvoiceRelationFactory
{
    public function __construct( ?MySQLConnectorWrapper $mysql_connector )
    {
        $this->setWrapper($mysql_connector);
    }

    public function recommendation_by_product_id( int $product_id ): ?array
    {
        $retVal = array();

        $sql = "select product_b_id, content from product_invoice_relations_ordered_by_relation where product_a_id=? limit 4";

        $retVal = null;
        $connection = $this->getWrapper()->connect();

        try
        {
            $stmt = $connection->prepare($sql);
            $stmt->bind_param('i', $stmt_comparator);
            $stmt_comparator = $product_id;
            $stmt->execute();

            $result = $stmt->get_result();

            if( $result->num_rows > CONSTANT_ZERO )
            {
                $retVal = array();

                while( $row = $result->fetch_assoc() )
                {
                    $arr = array( 'product_id' => $row['product_b_id'], 'relation' => $row['content'] );
                    array_push($retVal, $arr);
                }
            }
        }
        catch (Exception $ex)
        {
            echo $ex;
        }
        finally
        {
            $this->getWrapper()->disconnect();
        }

        return $retVal;
    }

    public function calculate_relations(): ?array
    {
        $products = $this->retrieve_products_ids();
        $product_calc = array();

        if(!is_null($products))
        {
            for( $idx = 0;
                 $idx < count( $products );
                 $idx++ )
            {
                $current_product_id = $products[$idx];
                $this->calculate_relations_for_product( $current_product_id, $product_calc );
            }
        }

        return $product_calc;
    }

    protected function calculate_relations_for_product( int $idx_product_id, &$model_array ): void
    {
        $invoice_ids = $this->retrieve_invoice_ids_with_product( $idx_product_id );

        if( !is_null( $invoice_ids ) )
        {
            for($idx = 0; $idx < count($invoice_ids); $idx++)
            {
                $current_invoice_id = $invoice_ids[$idx];

                $lines = $this->retrieve_line_at( $current_invoice_id );

                $this->calculate_relations_from_lines( $lines, $idx_product_id, $model_array );
            }
        }
    }

    protected function calculate_relations_from_lines( array $lines, int $idx_product_id, array &$calc_array ): void
    {
        foreach ( $lines as $line )
        {
            if(!( $line->getProductId() == $idx_product_id ) )
            {
                $model = new ProductInvoiceRelationModel();

                $model->setProductAId( $idx_product_id );
                $model->setProductBId( $line->getProductId() );
                $model->setContent(1.0);

                $this->is_in_array( $model, $calc_array);
            }
        }
    }

    protected function is_in_array( ?ProductInvoiceRelationModel $entity, array &$calc_array ): void
    {
        $is_in_array = false;

        foreach ( $calc_array as $current_entity )
        {
            if( $current_entity->getProductAId() == $entity->getProductAId() )
            {
                if( $current_entity->getProductBId() == $entity->getProductBId() )
                {
                    $total = $current_entity->getContent() + 1;
                    $current_entity->setContent( $total );
                    $is_in_array = true;
                }
            }
        }

        if( $is_in_array == false )
        {
            array_push($calc_array, $entity);
        }
    }

    protected function retrieve_invoice_ids_with_product( ?int $product_idx ): ?array
    {
        $sql = "select distinct product_invoice_line_id from delta_invoice_show_products where product_id=?";

        $retVal = null;
        $connection = $this->getWrapper()->connect();

        try
        {
            $stmt = $connection->prepare($sql);
            $stmt->bind_param('i', $stmt_comparator);
            $stmt_comparator = $product_idx;
            $stmt->execute();

            $result = $stmt->get_result();

            if( $result->num_rows > CONSTANT_ZERO )
            {
                $retVal = array();

                while( $row = $result->fetch_assoc() )
                {
                    $entity = $row['product_invoice_line_id'];

                    array_push($retVal, $entity);
                }
            }
        }
        catch (Exception $ex)
        {
            echo $ex;
        }
        finally
        {
            $this->getWrapper()->disconnect();
        }

        return $retVal;
    }


    protected function retrieve_line_at( int $idx_invoice ): ?array
    {
        $sql = "select distinct * from delta_invoice_show_products where product_invoice_line_id = ? order by product_invoice_line_id, product_id";

        $retVal = null;
        $connection = $this->getWrapper()->connect();

        try
        {
            $stmt = $connection->prepare($sql);
            $stmt->bind_param('i', $stmt_comparator);
            $stmt_comparator = $idx_invoice;
            $stmt->execute();

            $result = $stmt->get_result();

            if( $result->num_rows > CONSTANT_ZERO )
            {
                $retVal = array();

                while( $row = $result->fetch_assoc() )
                {
                    $entity = new ProductInvoiceLineRelation();

                    $entity->setProductInvoiceLineId($row['product_invoice_line_id']);
                    $entity->setProductId($row['product_id']);

                    array_push($retVal, $entity);
                }
            }
        }
        catch (Exception $ex)
        {
            echo $ex;
        }
        finally
        {
            $this->getWrapper()->disconnect();
        }

        return $retVal;
    }

    protected function retrieve_products_ids(): ?array
    {
        $sql = "select identity from product";

        $retVal = null;
        $connection = $this->getWrapper()->connect();

        try
        {
            $stmt = $connection->prepare($sql);
            $stmt->execute();

            $result = $stmt->get_result();

            if( $result->num_rows > CONSTANT_ZERO )
            {
                $retVal = array();

                while( $row = $result->fetch_assoc() )
                {
                    $int_value = $row['identity'];
                    array_push($retVal, $int_value);
                }
            }
        }
        catch (Exception $ex)
        {
            echo $ex;
        }
        finally
        {
            $this->getWrapper()->disconnect();
        }

        return $retVal;
    }

    public function create( &$model ): bool
    {
        $sql = "insert into product_invoice_relations(product_a_id, product_b_id, content) values(?, ?, ?);";

        $retVal = false;
        $connection = $this->getWrapper()->connect();

        try
        {
            $stmt = $connection->prepare($sql);

            $stmt->bind_param('iid', $stmt_a_id, $stmt_b_id, $content);

            $stmt_a_id = $model->getProductAId();
            $stmt_b_id = $model->getProductBId();
            $content = $model->getContent();

            $stmt->execute();
            $retVal = true;
        }
        catch (Exception $ex)
        {
            echo $ex;
            $this->getWrapper()->undoState();
        }

        return $retVal;
    }

    public function isDone()
    {
        $this->getWrapper()->finish();
        $this->getWrapper()->disconnect();
    }

    public function update( &$model )
    {
        $sql = "update product_invoice_relations set content=? where product_a_id=? and product_b_id=?;";

        $retVal = false;
        $connection = $this->getWrapper()->connect();

        try
        {
            $stmt = $connection->prepare($sql);

            $stmt->bind_param('dii',  $content, $stmt_a_id, $stmt_b_id);

            $content = $model->getContent();
            $stmt_a_id = $model->getProductAId();
            $stmt_b_id = $model->getProductBId();

            $stmt->execute();
        }
        catch (Exception $ex)
        {
            echo $ex;
            $this->getWrapper()->undoState();
        }

        return $retVal;
    }


    public function exist_pair( $id_a, $id_b ):bool
    {
        $sql = "select identity from product_invoice_relations where product_a_id = ? and product_b_id = ?";

        $retVal = false;
        $connection = $this->getWrapper()->connect();

        try
        {
            $stmt = $connection->prepare($sql);

            $stmt->bind_param('ii', $stmt_a_id, $stmt_b_id);

            $stmt_a_id = $id_a;
            $stmt_b_id = $id_b;

            $stmt->execute();

            $result = $stmt->get_result();

            if( $result->num_rows > CONSTANT_ZERO )
            {
                $retVal = false;

                while( $row = $result->fetch_assoc() )
                {
                    if(isset($row['identity']))
                    {
                        $retVal = true;
                    }
                }
            }
        }
        catch (Exception $ex)
        {
            echo $ex;
        }
        finally
        {
            $this->getWrapper()->disconnect();
        }

        return $retVal;
    }

    private $wrapper = null;

    /**
     * @return MySQLConnectorWrapper|null
     */
    public function getWrapper(): ?MySQLConnectorWrapper
    {
        return $this->wrapper;
    }

    /**
     * @param MySQLConnectorWrapper|null $wrapper
     */
    public function setWrapper(?MySQLConnectorWrapper $wrapper): void
    {
        $this->wrapper = $wrapper;
    }
}

?>