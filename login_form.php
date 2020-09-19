<?php require 'main.php'; ?>

<?php 
include 'model/profileFactory.php';
$factory = new ProfileFactory;

$profile = $factory->read( $_POST['username_form'], $_POST['password_form'] );

if( isset( $profile ) )
{
    // Do something

    $_SESSION['current_profile'] = $profile;

    redirect('index.php');
}
else 
{
    echo "wrong username or password";
}

?>