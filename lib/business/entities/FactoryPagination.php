<?php

class FactoryPagination
{
    public function __construct( ?BaseFactoryTemplate $factory )
    {
        $this->setFactory( $factory );

    }

    public function isPreviousMinimum(): bool
    {
        $projected = $this->getFactory()->getPaginationIndexCounter()->getCurrent();

        if( $projected == 0 || $projected < 0)
        {
            return true;
        }

        return false;
    }

    public function isNextMax(): bool
    {
        $projected = $this->getFactory()->getPaginationIndexCounter()->projectIncrease(2);

        $limit_value = $this->getFactory()->getLimitValue();

        $size = floatval( floatval( $this->getFactory()->length() ) / floatval( $limit_value ) );
        $floor_size = ceil($size);

        return (floatval($projected) > floatval($floor_size));
    }


    public function generateLink( $pagination ): string
    {
        return utf8_encode("{$this->getBase()}{$pagination}");
    }

    public function viewPreviousPagination(): int
    {
        return $this->getFactory()->getPaginationIndexValue();
    }

    public function viewCurrentPagination(): int
    {
        return $this->getFactory()->getPaginationIndexCounter()->projectIncrease(1);
    }

    public function viewNextPagination(): int
    {
        return $this->getFactory()->getPaginationIndexCounter()->projectIncrease(2);
    }


    public function getPaginationIndex(): int
    {
        return $this->getFactory()->getPaginationIndexValue();
    }


    //
    private $factory = null;
    private $base = null;

    /**
     * @return null
     */
    public function getFactory(): ?BaseFactoryTemplate
    {
        return $this->factory;
    }

    /**
     * @param BaseFactoryTemplate|null $factory
     */
    public function setFactory( ?BaseFactoryTemplate $factory ): void
    {
        $this->factory = $factory;
    }

    /**
     * @return string
     */
    public final function getBase(): string
    {
        return $this->base;
    }

    /**
     * @param string $base
     */
    public final function setBase( string $base ): void
    {
        $this->base = $base;
    }

}

?>