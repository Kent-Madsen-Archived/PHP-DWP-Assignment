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
        terminate_session();
    }

    // Redirect the browser
    redirect_to_local_page( '/homepage' );
?>