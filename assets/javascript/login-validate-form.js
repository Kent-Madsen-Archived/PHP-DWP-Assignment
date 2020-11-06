/**
 * Name: Register Validate Form
 * Type: JavaScript
 * Purpose: 
 */


/**
 * 
 */
function validate_login()
{
    if( !form_login_validate() )
    {
        console.log( "insuffient or invalid input" );
        block();
        return false;
    }

    return true;
};

/**
 * 
 */
function form_login_validate()
{
    if( !validate_username() )
    {    
        return false;
    }

    if( !validate_password() )
    {
        return false;
    }

    return true;
};

/**
 * 
 */
function validate_username()
{
    var username_id = document.getElementById( 'form_login_username_id' );
    var username_value = username_id.value;

    if( length_is_zero( username_value ) )
    {
        username_id.focus();
        return false;
    }

    return true;
}

/**
 * 
 */
function validate_password()
{
    var password_id = document.getElementById( 'form_login_password_id' );
    var password_value = password_id.value;

    if( length_is_zero( password_value ) )
    {
        password_id.focus();
        return false;
    }

    return true;
}

//
function block()
{
    event.preventDefault();
};

function length_is_zero( value )
{
    return ( value.length == 0 );
};