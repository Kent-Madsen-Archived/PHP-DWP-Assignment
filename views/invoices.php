<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    
    PageTitleController::getSingletonController()->append( ' - Invoices' );
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
        
        </main>
        
        <?php get_footer(); ?>
    </body>
</html>