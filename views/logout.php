<?php
    /**
     *  Title: Logout
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */
    // Backup: Temperarrily save necesarry data
    

    // Empties the current session
    unset( $_SESSION );
    $_SESSION = array();
    
    // Destroys the session cookie
    session_destroy();

    // Backup implement necesarry data


    // Redirect the browser
    redirect_to_local_page( 'homepage' );
?>