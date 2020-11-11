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

        $recaptcha_v2 = new ReCaptchaV2( GOOGLE_V2_RECAPTCHA_PRIVATE, GOOGLE_V2_RECAPTCHA_PUBLIC );
        $recaptcha_v2->setResponseKey( $_POST['g-recaptcha-response'] );
        
        $recaptcha_v2->retrieve_response();
        $recaptcha_v2->validate();
        
        // Honeypot trap
        if( !strlen( $_POST[ 'security_empty' ] ) == 0 )
        {
            throw new Exception( 'Empty field is not empty' );
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