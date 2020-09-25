<?php 
session_start();

function logged_in()
{
    return isset( $_SESSION['profile_user_identity'] );
}

?>

<!DOCTYPE html>