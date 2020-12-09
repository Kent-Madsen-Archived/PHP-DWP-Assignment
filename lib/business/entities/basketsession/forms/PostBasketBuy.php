<?php

abstract class PostBasketBuy
{
    public const field_identity = 'product_basket_product_identity';
    public const field_number_of_products = 'product_basket_number_of_products';
    public const field_price = 'product_basket_price';


    /**
     * @return bool
     */
    public static final function existPostIdentity():bool
    {
        return isset( $_POST[ self::field_identity ]);
    }


    /**
     * @return bool
     */
    public static final function existPostNumberOfProducts():bool
    {
        return isset( $_POST[ self::field_number_of_products ]);
    }


    /**
     * @return bool
     */
    public static final function existPostPrice():bool
    {
        return isset( $_POST[ self::field_price ]);
    }


    /**
     * @return int|null
     */
    public static final function getPostIdentity(): ?int
    {
        $var = $_POST[ self::field_identity ];
        $retVal = null;

        $retVal = filter_var( $var, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE );

        return $retVal;
    }


    /**
     * @return int|null
     */
    public static final function getPostNumberOfProducts(): ?int
    {
        $var = $_POST[ self::field_number_of_products ];
        $retVal = null;

        $retVal = filter_var( $var, FILTER_VALIDATE_INT, FILTER_NULL_ON_FAILURE );

        return $retVal;
    }


    /**
     * @return float|null
     */
    public static final function getPostPrice(): ?float
    {
        $var = $_POST[ self::field_price ];
        $retVal = null;

        $retVal = filter_var( $var, FILTER_VALIDATE_FLOAT, FILTER_NULL_ON_FAILURE );

        return $retVal;
    }


    /**
     * @return BasketEntry|null
     */
    public static final function generateEntry(): ?BasketEntry
    {
        return new BasketEntry( PostBasketBuy::getPostIdentity(),
                                PostBasketBuy::getPostNumberOfProducts(),
                                PostBasketBuy::getPostPrice() );
    }
}

?>