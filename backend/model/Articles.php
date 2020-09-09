<?php 
class Articles
{
    private $identity = 0;
    private $profile_identity = 0;

    private $title = "";
    private $content = "";
    private $registered = NULL;

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
        return $this->profile_identity;
    }

    function setProfileIdentity($var)
    {
        $this->profile_identity = $var;
    }

    function getTitle()
    {
        return $this->title;
    }

    function setTitle( $var )
    {
        $this->title = $var;
    }

    function getContent()
    {
        return $this->content;
    }

    function setContent( $var )
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