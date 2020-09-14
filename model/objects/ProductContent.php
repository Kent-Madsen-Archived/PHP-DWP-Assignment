<?php 

class ProductContent
{
    public function __construct( ) 
    {
        
    }

    
    private $identity = 0;
    private $product_id = 0;
    private $size_type_id = 0;
    private $url = 0;
    
    private $size_w = 0;
    private $size_h = 0;
    
    function getIdentity()
    {
        return $this->identity;
    }

    function setIdentity($var)
    {
        $this->identity = $var;
    }

    function getProductIdentity()
    {
        return $this->product_id;
    }

    function setProductIdentity($var)
    {
        $this->product_id = $var;
    }
}

?>