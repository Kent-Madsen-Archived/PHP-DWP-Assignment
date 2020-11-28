<?php
    /**
     *  Title: Invoices
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    
    PageTitleController::getSingletonController()->append( ' - Invoices' );
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
            <h2>
                Invoices
            </h2>
        </main>
        
        <?php getFooter(); ?>
    </body>
</html>