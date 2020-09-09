<?php 
class Articles
{
    private $identity = 0;
    private $profile_id = 0;

    private $title = "";
    private $content = "";
    private $registered = NULL;

    function getId()
    {
        return $this->identity;
    }

    function get_profile_identity()
    {
        return $this->profile_id;
    }

    function getTitle()
    {
        return $this->title;
    }

    function getContent()
    {
        return $this->content;
    }

    function getRegistered()
    {
        return $this->registered;
    }
}
?>