<?php
    /**
     *  Title: Logout
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    // Backup: Temperarrily save necesarry data

    // Empties the current session
    session_unset();
    
    // Destroys the session cookie
    session_destroy();

    // Removes the session cookie, in the browser
    setcookie( session_name(), '', time() - 120 );

    // Start a new session
    session_start();

    // Redirect the browser
    redirect_to_local_page( '/homepage' );
?>