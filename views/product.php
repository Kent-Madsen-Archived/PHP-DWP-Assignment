<?php
    /**
     *  Title: Product
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    /**
     * 
     */
    PageTitleController::getSingletonController()->append( ' - Product' );

    $router = RouterSingleton::getInstance()->getCurrentRoute();

    $operation_value = $router->getValidationTree()[1]->getValue();
    $id_value = $router->getValidationTree()[2]->getValue();
?>

<?php if( $operation_value == 'buy' ):?>
    <?php require 'views/product/page_view_buy.php' ?>
<?php elseif($operation_value=='clear_basket'):?>
    <?php require 'views/product/page_view_clear.php';?>
<?php endif;?>

<?php
    if( $operation_value == 'identity' )
    {
        if( is_null( $id_value ) )
        {
            redirect_to_local_page('/product');
        }
    }
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
            <h2> Products </h2>
            <?php if( !isset( $operation_value ) ): ?>
                <?php require 'views/product/page_view_frontpage.php';?>
            <?php elseif( $operation_value == 'identity' ): ?>
                <?php require 'views/product/page_view_product.php'; ?>
            <?php elseif( $operation_value == 'puchase' ): ?>
                <?php require 'views/product/page_view_purchase.php'; ?>
            <?php elseif ( $operation_value == 'pagination' ):?>
                <?php require 'views/product/page_view_pagination.php'; ?>
            <?php endif; ?>

        </main>
        
        <?php getFooter(); ?>
    </body>
</html>