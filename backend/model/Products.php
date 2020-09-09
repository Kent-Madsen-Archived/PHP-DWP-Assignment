<?php 
class Products
{
    private $identity = 0;
    private $profileIdentity = 0;
    private $title;
    private $description;
    private $price;

    function getIdentity()
    {
        return $this->identity;
    }
    
    function getProfileIdentity()
    {
        return $this->profileIdentity;
    }

    function getTitle()
    {
        return $this->title;
    }
    
    function getDescription()
    {
        return $this->description;
    }

    function getPrice()
    {
        return $this->price;
    }
    
    // Set
    function setIdentity( $var )
    {
        $this->identity = $var;
    }
    
    function setProfileIdentity( $var )
    {
        $this->profileIdentity = $var;
    }

    function setTitle( $var )
    {
        $this->title = $var;
    }
    
    function setDescription( $var )
    {
        $this->description = $var;
    }

    function setPrice( $var )
    {
        $this->price = $var;
    }
    
    
}


?>