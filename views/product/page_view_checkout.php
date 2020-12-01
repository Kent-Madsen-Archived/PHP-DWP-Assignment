<?php
if(SessionBasketForm::existBasketValues()):
?>

<?php $basket = BasketSessionSingleton::getBasket();

    foreach ($basket->getEntries() as $value)
    {
        $id = $value->getProductIdentity();
        $q = $value->getProductQuantity();
        $price = $value->getProductPrice();
        $total = $value->getProductTotalPrice();

        echo "<p> id: {$id}, price: {$price}, q: {$q}, total: {$total} </p>";
    }
?>


<?php
endif;
?>
