<?php 
class ProfileMail
{
    public function __construct( $identity, 
                                 $profile_id, 
                                 $profile_email, 
                                 $profile_email_registered, 
                                 $primary_mail ) 
    {
        $this->setIdentity( $identity );
        $this->setProfileIdentity( $profile_id );

        $this->setProfileEmail( $profile_email );
        $this->setProfileEmailRegistered( $profile_email_registered );
        $this->setProfilePrimaryEmail( $primary_mail );
    }

    private $identity = 0;
    private $profile_id = 0;

    private $profile_email = null;
    private $profile_email_registered = null;
    private $primary_mail = false;
    
    // Get / Setters
        //
    function getIdentity()
    {
        return $this->identity;
    }

    function setIdentity( $var )
    {
        $this->identity = $var;
    }

        //
    function getProfileIdentity()
    {
        return $this->profile_id;
    }

    function setProfileIdentity( $var )
    {
        $this->profile_id = $var;
    }

        //
    function getProfileEmail()
    {
        return $this->profile_email;
    }

    function setProfileEmail( $var )
    {
        $this->profile_email = $var;
    }

    
        //
    function getProfileEmailRegistered()
    {
        return $this->profile_email_registered;
    }

    function setProfileEmailRegistered( $var )
    {
        $this->profile_email_registered = $var;
    }

        //
    function getProfilePrimaryEmail()
    {
        return $this->primary_mail;
    }

    function setProfilePrimaryEmail( $var )
    {
        $this->primary_mail = $var;
    }
}
?>