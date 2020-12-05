<?php

class FactoryPagination
{
    /**
     * FactoryPagination constructor.
     * @param BaseFactoryTemplate|null $factory
     */
    public function __construct( ?BaseFactoryTemplate $factory )
    {
        $this->setFactory( $factory );

    }


    /**
     * @return bool
     */
    public final function isPreviousMinimum(): bool
    {
        $projected = $this->getFactory()->getPaginationIndexCounter()->getCurrent();

        if( $projected == 0 || $projected < 0)
        {
            return true;
        }

        return false;
    }


    /**
     * @return bool
     */
    public final function isNextMax(): bool
    {
        $projected = $this->getFactory()->getPaginationIndexCounter()->projectIncrease(2);

        $limit_value = $this->getFactory()->getLimitValue();

        $size = floatval( floatval( $this->getFactory()->length() ) / floatval( $limit_value ) );

        $div = $this->getFactory()->length() % $this->getFactory()->getLimitValue();

        if( !( $div == 0 ) )
        {
            $size = $size + 1;
        }

        return (floatval($projected) > floatval($size));
    }


    /**
     * @param $pagination
     * @return string
     */
    public final function generateLink( $pagination ): string
    {
        return utf8_encode("{$this->getBase()}{$pagination}");
    }


    /**
     * @return int
     */
    public final function viewPreviousPagination(): int
    {
        return $this->getFactory()->getPaginationIndexValue();
    }


    /**
     * @return int
     */
    public final function viewCurrentPagination(): int
    {
        return $this->getFactory()->getPaginationIndexCounter()->projectIncrease(1);
    }


    /**
     * @return int
     */
    public final function viewNextPagination(): int
    {
        return $this->getFactory()->getPaginationIndexCounter()->projectIncrease(2);
    }


    /**
     * @return int
     */
    public final function getPaginationIndex(): int
    {
        return $this->getFactory()->getPaginationIndexValue();
    }


    //
    private $factory = null;
    private $base = null;

    /**
     * @return null
     */
    public final function getFactory(): ?BaseFactoryTemplate
    {
        return $this->factory;
    }


    /**
     * @param BaseFactoryTemplate|null $factory
     */
    public final function setFactory( ?BaseFactoryTemplate $factory ): void
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