<?php

$relations = new ProductInvoiceRelationFactory(new MySQLConnectorWrapper(MySQLInformationSingleton::getSingleton()));
$product_calc = $relations->calculate_relations();

if(!is_null($product_calc))
{

    $total = array();

    if(!(sizeof($product_calc) == 0))
    {
        foreach ( $product_calc as $current_product_calc )
        {
            if($current_product_calc instanceof ProductInvoiceRelationModel)
            {
                $is_available = false;

                if(!( count( $total ) == 0 ) )
                {
                    foreach ( $total as $te )
                    {
                        if($te instanceof ProductInvoiceRelationModel)
                        {
                            if($current_product_calc->getProductAId()==$te->getProductAId())
                            {
                                if($current_product_calc->getProductBId()==$te->getProductBId())
                                {
                                    $te->setContent($te->getContent()+$current_product_calc->getContent());
                                    $is_available = true;
                                }
                            }
                        }
                    }
                }

                if( !$is_available )
                {
                    array_push($total, $current_product_calc);
                }
            }
        }
    }

    if(!(sizeof($total)==0))
    {
        foreach ( $total as $line )
        {
            if($relations->exist_pair($line->getProductAId(), $line->getProductBId()))
            {
                $relations->update($line);
                $relations->isDone();
            }
            else
            {
                $relations->create($line);
                $relations->isDone();
            }
        }
    }
}
?>