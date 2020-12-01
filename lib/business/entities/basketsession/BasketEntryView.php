<?php

class BasketEntryView
{
    public function __construct( BasketEntry $model )
    {
        $this->setModel( $model );
    }

    public function printAreaProductQuantity()
    {
        $str = strval( $this->getModel()->getProductQuantity() );
        return htmlentities("{$str}.");
    }


    public function printAreaProductTotalPrice()
    {
        $str = strval( $this->getModel()->calculateTotalPrice() );
        return htmlentities("{$str} dkk.");
    }

    private $model = null;

    /**
     * @return null
     */
    public function getModel(): ?BasketEntry
    {
        return $this->model;
    }

    /**
     * @param BasketEntry|null $model
     */
    public function setModel( ?BasketEntry $model ): void
    {
        $this->model = $model;
    }


}

?>