<?php

class ProductVariationModel
{
    private $identity = null;
    private $product_main_id = null;
    private $product_variant_of_id = null;

    /**
     * @return null
     */
    public function getIdentity()
    {
        return $this->identity;
    }

    /**
     * @return null
     */
    public function getProductMainId()
    {
        return $this->product_main_id;
    }

    /**
     * @return null
     */
    public function getProductVariantOfId()
    {
        return $this->product_variant_of_id;
    }

    /**
     * @param null $identity
     */
    public function setIdentity($identity): void
    {
        $this->identity = $identity;
    }

    /**
     * @param null $product_main_id
     */
    public function setProductMainId($product_main_id): void
    {
        $this->product_main_id = $product_main_id;
    }

    /**
     * @param null $product_variant_of_id
     */
    public function setProductVariantOfId($product_variant_of_id): void
    {
        $this->product_variant_of_id = $product_variant_of_id;
    }
}
?>