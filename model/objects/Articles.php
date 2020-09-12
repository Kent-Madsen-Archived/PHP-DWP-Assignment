<?php 
class Article
{
    public function __construct() 
    {
    
    }

    private $identity;
    private $profileIdentity;

    private $title;
    private $content;
    private $registered;

    function getIdentity()
    {
        return $this->identity;
    }

    function setIdentity($var)
    {
        $this->identity = $var;
    }

    function getProfileIdentity()
    {
        return $this->profileIdentity;
    }

    function setProfileIdentity($var)
    {
        $this->profileIdentity = $var;
    }

    function getTitle()
    {
        return $this->title;
    }

    function setTitle($var)
    {
        $this->title = $var;
    }

    function getContent()
    {
        return $this->content;
    }

    function setContent($var)
    {
        $this->content = $var;
    } 
    
    function getRegistered()
    {
        return $this->registered;
    }

    function setRegistered($var)
    {
        $this->registered = $var;
    }
}
?>