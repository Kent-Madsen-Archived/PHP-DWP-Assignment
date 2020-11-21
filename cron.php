<?php
    /**
     *  Title: Cron Job
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Page
     *  Project: DWP-Assignment
    */
    require 'bootstrap.php';

    $cred   = new UserCredential(WEBPAGE_DATABASE_USERNAME, WEBPAGE_DATABASE_PASSWORD);
    $net    = new NetworkAccess(WEBPAGE_DATABASE_HOSTNAME, WEBPAGE_DATABASE_PORT);
    $info   = new MySQLInformation( $net, $cred, WEBPAGE_DATABASE_NAME );

    $connector = new MySQLConnectorWrapper( $info );

    $t = new ContactFactory( $connector );

    $contacts = $t->readFormsNotSended();

    foreach( $contacts as $contact_mail )
    {
        $header = null;

        $header = "From:{$contact_mail->getFromEmail()} \r\n";
        $header .= "CC: \r\n";
        $header .= "MIME-Version: 1.0 \r\n";
        $header .= "Content-type: text/html \r\n";

        $retVal = mail( $contact_mail->getToEmail(), $contact_mail->getTitle(), $contact_mail->getMessage(), $header );

        //
        if( $retVal == true )
        {
            $t->updateIsFinished( $contact_mail->getIdentity() );
        }
        else
        {
            echo "Error";
        }
    }
?>