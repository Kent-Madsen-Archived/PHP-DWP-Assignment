<?php 

/**
 * 
 */
class ContactModel 
    implements ContactController, 
               ContactView
{
    //
    function __construct()
    {

    }

    // Variables
    private $message = null;
    private $subject = null;
    private $fromMail = null;


    // Accessor
    public function getMessage()
    {
        return $this->message;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getFromMail()
    {
        return $this->fromMail;
    }

    public function setFromMail( $var )
    {
        $this->fromMail = $var;
    }

    public function setSubject( $var )
    {
        $this->subject = $var;
    }

    public function setMessage( $var )
    {
        $this->message = $var;
    }

}

?>