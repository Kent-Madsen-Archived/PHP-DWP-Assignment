<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    $domain = new ProfileDomain();

    PageTitleController::getSingletonController()->append( ' - Profile' );
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
        
        <main> 
            <h4> Welcome, <?php echo $_SESSION[ 'user_session_object_username' ]; ?> </h4>
            
            <div> 
                
            </div>
        </main>

        <?php get_footer(); ?>
    </body>
</html>