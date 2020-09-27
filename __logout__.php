<?php require 'meta/main.php'; ?>

<?php 

unset($_SESSION);

session_destroy(); 

go_back();

?>