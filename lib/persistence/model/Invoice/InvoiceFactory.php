<?php
class InvoiceFactory
{
    public function __construct( ?MySQLConnectorWrapper $wrapper )
    {
        $this->setWrapper($wrapper);
    }

    private $wrapper = null;

    /**
     * @return MySQLConnectorWrapper|null
     */
    public final function getWrapper(): ?MySQLConnectorWrapper
    {
        return $this->wrapper;
    }

    /**
     * @param MySQLConnectorWrapper|null $wrapper
     */
    public final function setWrapper(?MySQLConnectorWrapper $wrapper): void
    {
        $this->wrapper = $wrapper;
    }
}
?>