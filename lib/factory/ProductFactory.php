<?php 

class ProductFactory
{
    function __construct( $mysql_connector )
    {
        $this->setConnector( $mysql_connector );
    }


    private $connector = null;

    /**
     * 
     */
     public function getConnector()
     {
        return $this->connector;
     }

    /**
    * 
    */
    public function setConnector( $var )
    {
        $this->connector = $var;
    }
}

?>