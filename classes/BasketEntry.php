<?php

class BasketEntry
{
    public function __construct($id, $q)
    {
        $this->setIdentity( $id );
        $this->setQuantity( $q );
    } 

    private $identity;
    private $quantity;

    public function increaseQuantity( $i )
    {
        $this->setQuantity( $this->getQuantity() + $i );
    }

    public function getIdentity()
    {
        return $this->identity;
    }

    public function setIdentity( $i )
    {
        $this->identity = $i;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }
    
    public function setQuantity($q)
    {
        $this->quantity = $q;
    }
    
}

?>