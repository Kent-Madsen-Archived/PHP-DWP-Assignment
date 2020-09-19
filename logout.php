<?php require 'main.php'; ?>
<?php

// Unset current variables
$_SESSION = array();

// Destroys the current session
session_destroy();

redirect('./index.php');

?>