/**
 * Name: contact Validate Form
 * Type: JavaScript
 * Purpose: 
 */

function validate_forgot()
{
    if( !form_forgot_validate() )
    {
        console.log( "insuffient or invalid input" );
        block();
    }

    return false;
};

function form_forgot_validate()
{
    if( !form_forgot_validate_email() )
    {
        return false;
    }

    return true;
};

function form_forgot_validate_email()
{
    var email_id = document.getElementById( 'forgot_form_email_id' );
    var email_value = email_id.value;

    if( length_is_zero( email_value ) )
    {
        email_id.focus();
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