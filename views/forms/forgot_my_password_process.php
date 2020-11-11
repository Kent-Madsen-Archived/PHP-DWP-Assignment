<?php 

if( isset( $_POST[ 'submit_forgot_form' ] ) )
{
    if( isset( $_SESSION[ 'fss_token' ] ) )
    {   
        // Compare strings
        if( !( $_SESSION[ 'fss_token' ] == $_POST[ 'security_token' ] ) )
        {
            throw new Exception( 'Security Error: FSS Token does not match with its form' );
        }
    }

}

?>