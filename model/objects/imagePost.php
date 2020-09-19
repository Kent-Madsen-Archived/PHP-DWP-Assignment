<?php 

class ImagePost
{
    
    function __construct( $identity, 
                          $source, 
                          $profile_identity, 
                          $title, 
                          $summary, 
                          $registered ) 
    {
        $this->setIdentity($identity);
        $this->setSource($source);
        $this->setProfileIdentity($profile_identity);
        $this->setTitle($title);
        $this->setSummary($summary);
        $this->setRegistered($registered);
    }

    private $identity;
    private $source; 

    private $profile_identity;

    private $title;
    private $summary;
    private $registered;
    
    public function getIdentity()
    {
        return $this->identity;
    }

    public function setIdentity($newVar)
    {
        $this->identity = $newVar;
    }

    public function getSource()
    {
        return $this->source;
    }

    public function setSource($newVar)
    {
        $this->source = $newVar;
    }

    public function getProfileIdentity()
    {
        return $this->profile_identity;
    }

    public function setProfileIdentity($newVar)
    {
        $this->profile_identity = $newVar;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle( $newVar )
    {
        $this->title = $newVar;
    }

    public function getSummary()
    {
        return $this->summary;
    }

    public function setSummary($newVar)
    {
        $this->summary = $newVar;
    }

    public function getRegistered()
    {
        return $this->registered;
    }

    public function setRegistered($newVar)
    {
        $this->registered = $newVar;
    }

}

?>