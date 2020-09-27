<?php 
spl_autoload_register(
    function ( $class_name ) 
    {
        include "classes/" . $class_name . '.php';
    }
);

session_start();

function logged_in()
{
    return isset( $_SESSION['profile_user_identity'] );
}

?>

<!DOCTYPE html>