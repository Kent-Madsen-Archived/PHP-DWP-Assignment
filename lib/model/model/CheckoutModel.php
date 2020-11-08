<?php 
    class CheckoutModel 
        extends DatabaseModel
            implements CheckoutView, CheckoutController
    {
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }


    }
?>