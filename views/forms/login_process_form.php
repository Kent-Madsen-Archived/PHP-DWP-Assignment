<?php
    /**
     *  Title:
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

        $authentication = new Auth();
        
        $credentials = $authentication->login( $_POST[ 'form_login_username' ], $_POST[ 'form_login_password' ] );

        if( !( $credentials == null ) )
        {
            echo "insert login functionality";
        }
    }
?>