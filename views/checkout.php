<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */
    $title = PageTitleSingleton::getInstance();
    $title->appendToTitle( ' - Checkout' );

    $domain = new CheckoutDomain();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/style.css">
        
        <?php 

            $title->printDocumentTitle();
        ?>
    </head>
    <body>
        <?php get_header(); ?>

        <main> 
        
        </main>
        
        <?php get_footer(); ?>
    </body>
</html>