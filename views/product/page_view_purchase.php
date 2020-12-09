<?php
    $domain = new CheckoutDomain();
    $invoice_id = $domain->purchase();

    if( SessionBasketForm::existBasketValues() )
    {
        SessionBasketForm::clearBasketValues();
    }

    bounce_link();

    $goto = "/invoice/identity/{$invoice_id}";
    redirect_to_local_page($goto);
?>