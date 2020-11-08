<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    if( isset( $_POST[ 'form_contact_submit' ] ) )
    {
        $domain = new ContactDomain();

        // Create new ContactModel
        $model = new ContactModel( null );
        
        $model->setSubject( $_POST[ 'form_contact_subject' ] );
        $model->setMessage( $_POST[ 'form_contact_message' ] );

        $model->setFromMail( $_POST['form_contact_from'] );
        $model->setToMail( WEBPAGE_DEFAULT_MAILTO );

        $model->setHasBeenSend( FALSE );        

        $domain->send( $model );
    }

?>