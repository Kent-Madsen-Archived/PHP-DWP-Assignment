<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */
 
    if( isset( $_POST[ 'form_login_submit' ] ) )
    {
        $authentication = new Auth();
        
        $credentials = $authentication->login( $_POST['form_login_username'], $_POST['form_login_password'] );

        if( !( $credentials == null ) )
        {
            echo "insert login functionality";
        }
    }
?>