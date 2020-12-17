<?php
    /**
     *  Title: Logout
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     *
     * Destroys the session and deletes the users session cookie.
     */

    // Backup: Temperarrily save necesarry data
    if( session_status() == PHP_SESSION_ACTIVE )
    {
        // Empties the current session data
        session_unset();

        // Destroys the session
        session_destroy();

        // Removes the session cookie, in the browser
        setcookie( session_name(), '', time() - 120 );

        // Starts a new session
        session_start();
    }

    // Redirect the browser
    redirect_to_local_page( '/homepage' );
?>