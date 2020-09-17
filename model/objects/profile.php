<?php 
class Profile
{
    function __construct( $identity, 
                          $username, 
                          $email, 
                          $password, 
                          $access_type ) 
    {
        $this->setIdentity( $identity );
        $this->setUsername( $username );
        $this->setEmail( $email );
        $this->setPassword( $password );
        $this->setAccessType( $access_type );
    }

    private $identity    = null; 
    private $username    = null; 
    private $email       = null;
    private $password    = null;
    private $access_type = null;

    public function getIdentity()
    {
        return $this->identity;
    }

    public function setIdentity( $idx )
    {
        $this->identity = $idx;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail( $email )
    {
        $this->email = $email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword( $newpassword )
    {
        $this->password = $newpassword;
    }

    public function getAccessType()
    {
        return $this->access_type;
    }

    public function setAccessType( $newType )
    {
        $this->access_type = $newType;
    }
}
?>