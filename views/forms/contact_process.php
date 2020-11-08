<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    if( isset( $_POST[ 'form_contact_submit' ] ) )
    {
        if( isset( $_SESSION[ 'fss_token' ] ) )
        {   
            // Compare strings
            if( !( $_SESSION[ 'fss_token' ] == $_POST[ 'security_token' ] ) )
            {
                throw new Exception( 'Security Error: FSS Token does not match with its form' );
            }
        }



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