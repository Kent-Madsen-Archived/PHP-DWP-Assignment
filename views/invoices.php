<?php
    /**
     *  Title: Invoices
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    PageTitleController::getSingletonController()->append( ' - Invoices' );

    $router = RouterSingleton::getInstance()->getCurrentRoute();

    $operation_value = $router->getValidationTree()[1]->getValue();
    $id_value = $router->getValidationTree()[2]->getValue();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo encodingStandardHTML(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        
        <?php
            PageTitleView::getSingletonView()->printHTML();
        ?>
    </head>
    <body>
        <?php getHeader(); ?>
        
        <main>
            <h3>
                Invoices
            </h3>

            <?php if( !isset( $operation_value ) ): ?>
                <?php require 'views/invoice/invoice_frontpage.php'; ?>

            <?php elseif( $operation_value == 'identity' ): ?>
                <?php if( isset( $id_value ) ): ?>
                    <?php require 'views/invoice/invoice_page.php';?>
                <?php endif; ?>

            <?php endif; ?>
        </main>
        
        <?php getFooter(); ?>
    </body>
</html>