<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */
    require_once 'general.php';

    if( isset( $_POST[ 'form_login_submit' ] ) )
    {
        if( !login_form_validate_username() )
        {
            echo "Error in validation of username </br>";
            exit( 'forbidden: invalid data or illegal activity has been found.' );   
        }
        
        if( !login_form_validate_password() )
        {
            echo "Error in validation of password </br>";
            exit( 'forbidden: invalid data or illegal activity has been found.' );   
        }
    }

    // Validation stages
    function login_form_validate_username()
    {
        if( validate_input_is_not_set( $_POST[ 'form_login_username' ] ) )
        {
            return false;
        }

        if( validate_input_is_null_or_zero_length( $_POST[ 'form_login_username' ] ) )
        {
            return false;
        }

        return true;
    }

    function login_form_validate_password()
    {
        if( validate_input_is_not_set( $_POST[ 'form_login_password' ] ) )
        {
            return false;
        }

        if( validate_input_is_null_or_zero_length( $_POST[ 'form_login_password' ] ) )
        {
            return false;
        }

        return true;
    }

?>