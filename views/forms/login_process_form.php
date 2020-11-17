<?php
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */
     
    if( isset( $_POST[ 'form_login_submit' ] ) )
    {
        if( isset( $_SESSION[ 'fss_token' ] ) )
        {   
            // Compare strings
            if( !( $_SESSION[ 'fss_token' ] == $_POST[ 'security_token' ] ) )
            {
                throw new Exception( 'Security Error: FSS Token does not match with its form' );
            }
        }

        $authentication = new AuthDomain();
        
        $credentials = $authentication->login( $_POST[ 'form_login_username' ], $_POST[ 'form_login_password' ] );

        if( !( $credentials == null ) )
        {
            $session = new UserSession( $credentials );

            $_SESSION['user_session_object_identity'] = $session->getIdentity();

            $_SESSION['user_session_object_username'] = $session->getUsername();
            $_SESSION['user_session_object_profile_type'] = $session->getProfileType();
            
            //
            redirect_to_local_page( 'homepage' );
        }
    }
?>