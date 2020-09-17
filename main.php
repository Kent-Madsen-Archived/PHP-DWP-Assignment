<?php 
session_start();

function is_logged_in()
{
    return isset($_SESSION['current_profile']);
}

function is_current_user_owners()
{
    if( isset( $_SESSION['current_profile'] ) )
    {
        // Check access type

    }
}

function redirect($topage)
{
    header('Location:' . $topage);
};

?>