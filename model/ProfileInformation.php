<?php 
class ProfileInformation
{
    public function __construct() 
    {
    
    }

    private $identity;
    private $profileIdentity;

    private $personName;
    private $address;
    private $postZone;
    private $country;
    private $birthday;

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


    function getPersonName()
    {
        return $this->personName;
    }

    function setPersonName( $var )
    {
        $this->personName = $var;
    }

    function getAddress()
    {
        return $this->address;
    }

    function setAddress( $var )
    {
        $this->address = $var;
    }

    function getPostZone()
    {
        return $this->postZone;
    }

    function setPostZone( $var )
    {
        $this->postZone = $var;
    }

    function getCountry()
    {
        return $this->country;
    }

    function setCountry( $var )
    {
        $this->country = $var;
    }

    function getBirthday()
    {
        return $this->birthday;
    }

    function setBirthday($var)
    {
        $this->birthday = $var;
    }
}
?>