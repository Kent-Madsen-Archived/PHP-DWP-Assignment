<?php 
    unset( $_SESSION );
    $_SESSION = array();
    
    session_destroy();
?>