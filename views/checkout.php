<?php
    /**
     *  Title: Checkout
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    $domain = new CheckoutDomain();

    PageTitleController::getSingletonController()->append( ' - Checkout' );
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo encodingStandardHTML(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/style.css">
        
        <?php
            PageTitleView::getSingletonView()->printHTML();
        ?>
    </head>
    <body>
        <?php getHeader(); ?>

        <main> 
        
        </main>
        
        <?php getFooter(); ?>
    </body>
</html>