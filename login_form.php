<?php 
session_start();
require_once "model/ProfileFactory.php";

if( !( $_POST["form_username"] == null ) && !($_POST["form_username"] == "") )
{
    $factory = new ProfileFactory;
    $found = $factory->findByUsername( $_POST["form_username"] );

    $id = $found->getIdentity();
    $username = $found->getUsername();
    $password = $found->getPassword();
    $user_type = $found->getProfileType();

    $hashed_password = hash( "sha512", $_POST["form_password"] );

    if($password == $hashed_password)
    {
        // We got a match. made in heaven.
        $_SESSION["id"] = $id;
        $_SESSION["username"] = $username;
        $_SESSION["profileType"] = $user_type;
        
        header("Location:./index.php");
    }
}

?>