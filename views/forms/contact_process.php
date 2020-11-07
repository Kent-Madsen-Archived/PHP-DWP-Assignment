<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    if( isset( $_POST[ 'form_contact_submit' ] ) )
    {
        // 
        $access = new NetworkAccess( 'localhost', 3600 );
        $user_credential = new UserCredential( 'development', 'Epc63gez' );

        $database = "dwp_assignment";

        //
        $mysql_information = new MySQLInformation( $access, $user_credential, $database );

        //
        $connection = new MySQLConnector( $mysql_information );

        // Factories prepared
        $person_email_factory = new PersonEmailFactory( $connection );
        $contact_factory = new ContactFactory( $connection );

        // to be changed, finds email models instanses
        $from_value = $person_email_factory->get_by_name( $_POST['form_contact_from'] )[0];
        
        $to_value = $person_email_factory->get_by_name( WEBPAGE_DEFAULT_MAILTO )[0];


        // Create new ContactModel
        $model = new ContactModel( $contact_factory );
        
        $model->setSubject( $_POST[ 'form_contact_subject' ] );
        $model->setMessage( $_POST[ 'form_contact_message' ] );

        $model->setFromMail( $from_value->getIdentity() );
        $model->setToMail( $to_value->getIdentity() );

        $model->setHasBeenSend( FALSE );        

        // Upload model
        $contact_factory->createRequest( $model );
    }

?>