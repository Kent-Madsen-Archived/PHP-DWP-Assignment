<?php session_start(); ?>

<?php 
// removal of all session variables
session_unset(); 

// destroys the session
session_destroy(); 

header("Location:./index.php");
?>