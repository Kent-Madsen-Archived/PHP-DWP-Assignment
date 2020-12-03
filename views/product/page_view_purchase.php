<?php
    $domain = new CheckoutDomain();

    $arr = $domain->purchase();

    if( SessionBasketForm::existBasketValues() )
    {
        SessionBasketForm::clearBasketValues();
    }

    bounce_link();
?>