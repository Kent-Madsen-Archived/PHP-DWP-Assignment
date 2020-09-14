<?php 

class Product
{
    public function __construct( ) 
    {
        
    }

    private $identity = 0;
    private $profile_id = 0;

    private $title = "";
    private $descriptiopn = "";
    private $price = "";

    // Get / Setter functions
    function getIdentity()
    {
        return $this->identity;
    }

    function setIdentity( $var )
    {
        $this->identity = $var;
    }

    function getProfileIdentity()
    {
        return $this->profileIdentity;
    }

    function setProfileIdentity( $var )
    {
        $this->profileIdentity = $var;
    }

    function getTitle()
    {
        return $this->title;
    }

    function setTitle( $var )
    {
        $this->title = $var;
    }

    function getDescription()
    {
        return $this->descriptiopn;
    }

    function setDescription( $var )
    {
        $this->descriptiopn = $var;
    }

    function getPrice()
    {
        return $this->price;
    }

    function setPrice( $var )
    {
        $this->price = $var;
    }



}

?>