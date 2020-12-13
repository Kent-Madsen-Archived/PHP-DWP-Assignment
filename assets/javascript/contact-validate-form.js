/**
 * Name: contact Validate Form
 * Type: JavaScript
 * Purpose: 
 */

function validate_contact()
{
    if( !form_contact_validate() )
    {
        console.log( "insuffient or invalid input" );
        block();
        return false;
    }

    return true;
};

function form_contact_validate()
{
    if( !form_forgot_validate_from() )
    {
        return false;
    }

    if( !form_forgot_validate_subject() )
    {
        return false;
    }

    if( !form_forgot_validate_message() )
    {
        return false;
    }

    return true;
};

function form_forgot_validate_from()
{
    var from_id = document.getElementById( 'form_contact_from_id' );
    var from_value = from_id.value;

    if( length_is_zero( from_value ) )
    {
        from_id.focus();
        return false;
    }

    return true;
};

function form_forgot_validate_subject()
{
    var subject_id = document.getElementById( 'form_contact_subject_id' );
    var subject_value = subject_id.value;

    if( length_is_zero( subject_value ) )
    {
        subject_id.focus();
        return false;
    }

    return true;
}

function form_forgot_validate_message()
{
    var message_id = document.getElementById( 'form_contact_message_id' );
    var message_value = message_id.value;

    if( length_is_zero( message_value ) )
    {
        message_id.focus();
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