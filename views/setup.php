<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */


    PageTitleController::getSingletonController()->append( ' - Setup' );
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/style.css">
        
        <?php
                PageTitleView::getSingletonView()->PrintHTML();

                $access = new NetworkAccess( WEBPAGE_DATABASE_HOSTNAME, WEBPAGE_DATABASE_PORT );
                $user_credential = new UserCredential( WEBPAGE_DATABASE_USERNAME, WEBPAGE_DATABASE_PASSWORD );

                $database = 'dwp_assignment';

                $setup = new SetupInstallation(new MySQLConnectorWrapper(new MySQLInformation( $access, $user_credential, $database )));

                $setup->installation_status();
        ?>
    </head>
    <body>
        <?php get_header(); ?>

        <main> 
        
        </main>
        
        <?php get_footer(); ?>
    </body>
</html>