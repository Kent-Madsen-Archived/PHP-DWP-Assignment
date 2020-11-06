<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */
    unset( $_SESSION );
    $_SESSION = array();
    
    session_destroy();
?>