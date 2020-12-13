<?php

    abstract class BasketSessionSingleton
    {
        public final static function getBasket()
        {
            $basket = new BasketSession();

            $arr = SessionBasketForm::getBasketValues();

            if( is_null( $arr ) )
            {
                return null;
            }

            for( $idx = 0; $idx < sizeof($arr); $idx++ )
            {
                $current = $arr[$idx];

                $entry = BasketEntry::convertToObject($current);
                $basket->append( $entry );
            }

            return $basket;
        }

        public final static function setBasket( BasketSession $basket_session )
        {
            SessionBasketForm::setBasketValues( $basket_session->makeArray() );
        }
    }

?>