<?php

    $t = GroupContact::getContactFactory();

    $contacts = $t->readFormsNotSended();

    foreach( $contacts as $contact_mail )
    {
        $header = null;

        $header = "From:{$contact_mail->getFromEmail()} \r\n";

        $header .= "CC: \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-type: text/html \r\n";

        $retVal = false;

        try
        {
            $retVal = mail( $contact_mail->getToEmail(), $contact_mail->getTitle(), wordwrap( $contact_mail->getMessage(), 70, "\r\n" ), $header );
        }
        catch ( Exception $ex )
        {
            $retVal = false;
        }

        //
        if( $retVal == true )
        {
            // Successfull
            $t->updateIsFinished( $contact_mail->getIdentity() );
        }
        else
        {
            echo "Error";
        }
    }

?>