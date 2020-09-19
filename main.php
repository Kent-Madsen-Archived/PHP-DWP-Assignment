<?php 
session_start();

define("databaseServerHostname", "127.0.0.1");
define("databaseServerUser", "root");
define("databaseServerPass", "");
define("databaseServerDatabase", "dwp_assignment");

function is_logged_in()
{
    return isset( $_SESSION[ 'current_profile' ] );
}

function is_current_user_owners()
{
    if( isset( $_SESSION[ 'current_profile' ] ) )
    {
        // Check access type

    }
}

function redirect( $topage )
{
    header('Location:' . $topage);
};

?>