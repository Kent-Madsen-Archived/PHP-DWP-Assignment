<?php

class Profile
{
    private $identity = 0;
    private $username = 0;
    private $password = 0;

    private $profile_type = 0;
        
    function getIdentity()
    {
        return $this->identity;
    }

    function getUsername()
    {
        return $this->username;
    }

    function getPassword()
    {
        return $this->password;
    }

    function getProfileType()
    {
        return $this->profile_type;
    }

    // Setters
    function setIdentity($var)
    {
        $this->identity = $var;
    }

    function setUsername($var)
    {
        $this->username = $var;
    }

    function setPassword($var)
    {
        $this->password = $var;
    }

    function setProfileType($var)
    {
        $this->profile_type = $var;
    }
    
}


?>