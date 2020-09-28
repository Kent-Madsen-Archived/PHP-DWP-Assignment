<?php 
require 'config.php';

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

function go_back()
{
    header( 'Location: ' . $_SERVER['HTTP_REFERER'] );
}

function language( $lang )
{
    echo 'lang="' . $lang . '"';
}

$Title= new TitleConstructor("Webshop");   

?>

<!DOCTYPE html>