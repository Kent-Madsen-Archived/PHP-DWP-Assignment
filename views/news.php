<?php
    /**
     *  Title: News
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */
     
    PageTitleController::getSingletonController()->append( ' - News' );
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/style.css">
        
        <?php
             PageTitleView::getSingletonView()->printHTML();
        ?>
    </head>
    <body>
        <?php get_header(); ?>

        <?php 
            $access = new NetworkAccess( WEBPAGE_DATABASE_HOSTNAME, WEBPAGE_DATABASE_PORT );   
            $user_credential = new UserCredential( WEBPAGE_DATABASE_USERNAME, WEBPAGE_DATABASE_PASSWORD );

            $database = WEBPAGE_DATABASE_NAME;


        ?>

        <main>

        </main>
        
        <?php get_footer(); ?>
    </body>
</html>