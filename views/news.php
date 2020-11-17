<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
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
             PageTitleView::getSingletonView()->PrintHTML();
        ?>
    </head>
    <body>
        <?php get_header(); ?>

        <?php 
            $access = new NetworkAccess( WEBPAGE_DATABASE_HOSTNAME, WEBPAGE_DATABASE_PORT );   
            $user_credential = new UserCredential( WEBPAGE_DATABASE_USERNAME, WEBPAGE_DATABASE_PASSWORD );

            $database = WEBPAGE_DATABASE_NAME;

            $c = new ArticleModel( null );

            $arr = class_implements($c);

            foreach ($arr as $value)
            {
                var_dump($value);
                echo "</br>";
            }


        ?>

        <main>

        </main>
        
        <?php get_footer(); ?>
    </body>
</html>