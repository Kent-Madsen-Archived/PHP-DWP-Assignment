<?php

if( isset( $random_chosen_product ) )
{
    if( !$timed_discount_factory->isProductOnDiscount( $random_chosen_product ) )
    {
        $model = $timed_discount_factory->createModel();

        $model->setProductId( $random_chosen_product );
        $model->setDiscountPercentage(30);

        $timed_discount_factory->createWithNoDates($model);
    }
}
?>