<?php
    if( SessionBasketForm::existBasketValues() )
    {
        SessionBasketForm::clearBasketValues();
    }

    redirect_to_local_page('/checkout');
?>