<?php

class ProductInvoiceRelationModel
{
    private $identity = null;

    private $product_a_id = null;
    private $product_b_id = null;

    private $content = null;

    /**
     * @return float|null
     */
    public function getContent(): ?float
    {
        return $this->content;
    }

    /**
     * @return null
     */
    public function getIdentity(): int
    {
        return $this->identity;
    }

    /**
     * @return int|null
     */
    public function getProductAId(): ?int
    {
        return $this->product_a_id;
    }

    /**
     * @return int|null
     */
    public function getProductBId(): ?int
    {
        return $this->product_b_id;
    }

    /**
     * @param float|null $content
     */
    public function setContent(?float $content): void
    {
        $this->content = $content;
    }

    /**
     * @param int|null $identity
     */
    public function setIdentity(?int $identity): void
    {
        $this->identity = $identity;
    }

    /**
     * @param int|null $product_a_id
     */
    public function setProductAId( ?int $product_a_id ): void
    {
        $this->product_a_id = $product_a_id;
    }

    /**
     * @param int|null $product_b_id
     */
    public function setProductBId( ?int $product_b_id ): void
    {
        $this->product_b_id = $product_b_id;
    }
}

?>