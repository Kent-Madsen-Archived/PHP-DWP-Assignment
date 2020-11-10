<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */
    require_once 'general.php';

    //
    if( isset( $_POST[ 'form_register_submit' ] ) )
    {
        // Username
        if( !register_form_validate_username() )
        {
            echo "Error in validation of username </br>";
            exit( 'forbidden: invalid data or illegal activity has been found.' );
        }

        // Password
        if( !register_form_validate_password() )
        {
            echo "Error in validation of password </br>";
            exit( 'forbidden: invalid data or illegal activity has been found.' );
        }

        // Person Name
        if( !register_form_validate_personal_name() )
        {
            echo "Error in validation of personal name </br>";
            exit( 'forbidden: invalid data or illegal activity has been found.' );
        }

        // Personal Information
        if( !register_form_validate_personal_information() )
        {
            echo "Error in validation of personal information </br>";
            exit( 'forbidden: invalid data or illegal activity has been found.' );
        }

        // Address
        if( !register_form_validate_address() )
        {
            echo "Error in validation of address </br>";
            exit( 'forbidden: invalid data or illegal activity has been found.' );   
        }
    }

// Validation stages
function register_form_validate_username()
{
    if( validate_input_is_not_set( $_POST[ 'form_register_username' ] ) )
    {
        return false;
    }

    $username = $_POST[ 'form_register_username' ];

    if( validate_input_is_null_or_zero_length( $username ) )
    {
        return false;
    }

    return true;
}

function register_form_validate_password()
{
    // Password
    if( validate_input_is_not_set( $_POST[ 'form_register_password' ] ) )
    {
        return false;
    }

    $password = $_POST[ 'form_register_password' ];
    
    if( validate_input_is_null_or_zero_length( $password ) )
    {
        return false;
    }

    // Password Again
    if( validate_input_is_not_set( $_POST[ 'form_register_password_again' ] ) )
    {
        return false;
    }

    $password_again = $_POST[ 'form_register_password_again' ];

    if( validate_input_is_null_or_zero_length( $password_again ) )
    {
        return false;
    }
    
    // If not equal, it's invalidated
    if( !( $password == $password_again ) )
    {
        return false;
    }

    return true;
}

function register_form_validate_personal_name()
{
    //
    if( validate_input_is_not_set( $_POST[ 'form_register_firstname' ] ) )
    {
        return false;
    }

    $firstname = $_POST[ 'form_register_firstname' ];
    
    if( validate_input_is_null_or_zero_length( $firstname ) )
    {
        return false;
    }

    //
    if( validate_input_is_not_set( $_POST[ 'form_register_lastname' ] ) )
    {
        return false;
    }
    
    $lastname = $_POST[ 'form_register_lastname' ];

    if( validate_input_is_null_or_zero_length( $lastname ) )
    {
        return false;
    }

    //
    if( validate_input_is_not_set( $_POST[ 'form_register_middlename' ] ) )
    {
        return false;
    }
    
    $middlename = $_POST[ 'form_register_middlename' ];
    
    if( validate_input_is_null_or_zero_length( $middlename ) )
    {
        return false;
    }

    return true;
}

function register_form_validate_personal_information()
{
    // Email
    if( validate_input_is_not_set( $_POST[ 'form_register_email' ] ) )
    {
        return false;
    }

    $email = $_POST[ 'form_register_email' ];

    if( validate_input_is_null_or_zero_length( $email ) )
    {
        return false;
    }

    // birthday
    if( validate_input_is_not_set( $_POST[ 'form_register_birthday' ] ) )
    {
        return false;
    }

    $birthday = $_POST[ 'form_register_birthday' ];


    // phone number
    if( validate_input_is_not_set( $_POST[ 'form_register_phone_number' ] ) )
    {
        return false;
    }

    $phonenumber = $_POST[ 'form_register_phone_number' ];

    if( validate_input_is_null_or_zero_length( $phonenumber ) )
    {
        return false;
    }

    return true;
}

function register_form_validate_address()
{
    // Country
    if( validate_input_is_not_set( $_POST[ 'form_register_country' ] ) )
    {
        return false;
    }

    $country = $_POST[ 'form_register_country' ];

    if( validate_input_is_null_or_zero_length( $country ) )
    {
        return false;
    }

    // street name
    if( validate_input_is_not_set( $_POST[ 'form_register_street_name' ] ) )
    {
        return false;
    }

    $street_name = $_POST[ 'form_register_street_name' ];
    
    if( validate_input_is_null_or_zero_length( $street_name ) )
    {
        return false;
    }

    // address number
    if( validate_input_is_not_set( $_POST[ 'form_register_street_address_number' ] ) )
    {
        return false;
    }

    $street_address_number = $_POST[ 'form_register_street_address_number' ];

    if( validate_input_is_zero( $street_address_number ) )
    {
        return false;
    }

    // zip code
    if( validate_input_is_not_set( $_POST[ 'form_register_street_zip_code' ] ) )
    {
        return false;
    }

    $street_zip_code = $_POST[ 'form_register_street_zip_code' ];

    if( validate_input_is_null_or_zero_length( $street_zip_code ) )
    {
        return false;
    }

    return true;
}

?>