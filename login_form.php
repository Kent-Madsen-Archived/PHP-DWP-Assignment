<?php require 'main.php'; ?>
<?php 

include 'model/profileFactory.php';

$factory = new ProfileFactory;

$profile = $factory->read($_POST['username_form'], $_POST['password_form']);


if( isset( $profile ) )
{
    // Do something
    echo 'Your logged in </br>';

    $_SESSION['current_profile'] = $profile;
}
else 
{
    echo "wrong password";
}

?>