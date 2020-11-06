/**
 * Name: Register Validate Form
 * Type: JavaScript
 * Purpose: 
 */


/**
 * 
 */
function validate_register()
{
    if( !form_register_validate() )
    {
        console.log( "insuffient or invalid input" );
        block();
    }

    return false;
};

/**
 * 
 */
function form_register_validate()
{
    //
    if( !form_register_validate_username() )
    {
        console.log( "validation of username failed" );
        return false;
    }

    //
    if( !form_register_validate_password() )
    {
        console.log( "validation of password failed" );
        return false;
    }

    //
    if( !form_register_validate_email() )
    {
        console.log( "validation of email failed" );
        return false;
    }

    //
    if( !form_register_validate_birthday() )
    {
        console.log( "validation of birthday failed" );
        return false;
    }

    //
    if( !form_register_validate_phonenumber() )
    {
        console.log( "validation of phone number failed" );
        return false;
    }
    
    if( !form_register_validate_name() )
    {
        console.log( "validation of name failed" );
        return false;
    }

    if( !form_register_validate_address() )
    {
        console.log( "validation of address failed" );
        return false;
    }

    return true;
};

/**
 * 
 */
function form_register_validate_username()
{
    var id_username = document.getElementById( 'form_register_username_id' );
    var username_value = id_username.value;

    if( length_is_zero( username_value ) )
    {
        return false;
    }
    
    return true;
};

/**
 * 
 */
function form_register_validate_password()
{
    var id_password = document.getElementById( 'form_register_password_id' );
    var password_value = id_password.value;

    if( length_is_zero( password_value ) )
    {
        id_password.focus();
        return false;
    }

    var id_password_again = document.getElementById( 'form_register_password_again_id' );
    var password_again_value = id_password_again.value;

    if( length_is_zero( password_again_value ) )
    {
        id_password_again.focus();
        return false;
    }

    if( !( password_value == password_again_value ) )
    {
        return false;
    }
    
    return true;
};

/**
 * 
 */
function form_register_validate_phonenumber()
{
    var id_phonenumber = document.getElementById( 'form_register_phone_number_id' );
    var phonenumber_value = id_phonenumber.value;
    
    if( length_is_zero( phonenumber_value ) )
    {
        return false;
    }

    return true;
};

/**
 * 
 */
function form_register_validate_email()
{
    var id_email = document.getElementById( 'form_register_email_id' );
    var email_value = id_email.value;

    if( length_is_zero( email_value ) )
    {
        return false;
    }

    return true;
};

/**
 * 
 */
function form_register_validate_birthday()
{
    var id_birthday = document.getElementById( 'form_register_birthday_id' );
    var birthday_value = id_birthday.value;

    return true;
};

/**
 * 
 */
function form_register_validate_name()
{
    //
    var id_firstname = document.getElementById( 'form_register_firstname_id' );
    var first_name_value = id_firstname.value;

    if( length_is_zero( first_name_value ) )
    {
        return false;
    }

    //
    var id_lastname = document.getElementById( 'form_register_lastname_id' );
    var last_name_value = id_lastname.value;
    
    if( length_is_zero( last_name_value ) )
    {
        return false;
    }

    //
    var id_middlename = document.getElementById( 'form_register_middlename_id' );
    var middle_name_value = id_middlename.value;

    if( length_is_zero( middle_name_value ) )
    {
        return false;
    }

    return true;
};

/**
 * 
 */
function form_register_validate_address()
{
    var id_street_name = document.getElementById( 'form_register_street_name_id' );
    var street_name_value = id_street_name.value;

    if( length_is_zero( street_name_value ) )
    {
        return false;
    }

    var id_street_address_number = document.getElementById( 'form_register_street_address_number_id' );
    var street_address_number_value = id_street_address_number.value;

    if( street_address_number_value == 0 )
    {
        return false;
    }

    var id_street_zip_code = document.getElementById( 'form_register_street_zip_code_id' );
    var street_zip_value = id_street_zip_code.value;

    if( street_zip_value == 0 )
    {
        return false;
    }
    
    var id_country = document.getElementById( 'form_register_country_id' );
    var country_value = id_country.value;

    if( length_is_zero( country_value ) )
    {
        return false;   
    }
    
    return true;
};

//
function block()
{
    event.preventDefault();
};

function length_is_zero( value )
{
    return ( value.length == 0 );
};