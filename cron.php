<?php
    /**
     *  Title: Cron Job
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Page
     *  Project: DWP-Assignment
    */
    require 'inc/bootstrap.php';

    $port_smtp_is_open = false; 
    $mysql_available = true;


    require 'inc/crons/system.php';

    $connection_stmp = @fsockopen('localhost', 25);

    if( is_resource( $connection_stmp ) )
    {
        $port_smtp_is_open = true;
        fclose( $connection_stmp );
    }

    if( $port_smtp_is_open )
    {
        require 'inc/crons/contacts.php';
    }

    if($mysql_available)
    {
        require 'inc/crons/discount.php';
        require 'inc/crons/relation.php';
    }
?>