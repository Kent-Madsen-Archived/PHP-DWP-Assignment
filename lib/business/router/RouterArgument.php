<?php

class RouterArgument
{
    public function __construct($value, $index)
    {
        $this->setValue($value);
        $this->setIndex($index);
    }


    // Variables
    private $value = null;
    private $index = 0;

    /**
     * @return int
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * @return null
     */
    final public function getValue(): ?string
    {
        return $this->value;
    }


    /**
     * @param int $index
     * @return int
     */
    public function setIndex( int $index ): int
    {
        $this->index = $index;
        return $this->getIndex();
    }


    /**
     * @param $value
     * @return string|null
     */
    final public function setValue($value): ?string
    {
        $this->value = $value;

        return $this->getValue();
    }
}

?>