<?php

class ProductInvoiceLineRelation
{
    private $product_invoice_line_id = null;
    private $product_id = null;

    /**
     * @param null $product_id
     */
    public function setProductId($product_id): void
    {
        $this->product_id = $product_id;
    }

    /**
     * @return null
     */
    public function getProductId(): int
    {
        return $this->product_id;
    }

    /**
     * @return null
     */
    public function getProductInvoiceLineId(): int
    {
        return $this->product_invoice_line_id;
    }

    /**
     * @param null $product_invoice_line_id
     */
    public function setProductInvoiceLineId($product_invoice_line_id): void
    {
        $this->product_invoice_line_id = $product_invoice_line_id;
    }
}
?>