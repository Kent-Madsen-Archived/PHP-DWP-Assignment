<?php require 'main.php'; ?>

<?php 

include 'model/profileFactory.php';

$factory = new ProfileFactory;

$factory->create($_POST["username_form"], $_POST["email_form"], $_POST["password1_form"], 1);
?>