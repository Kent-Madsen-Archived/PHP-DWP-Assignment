<?php
    /**
     *  Title: Checkout
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    $domain = new CheckoutDomain();
    $overview = $domain->overviewOfBasket();

    PageTitleController::getSingletonController()->append( ' - Checkout' );
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
        <?php
            getHeader();
        ?>

        <main>
            <h2>
                Checkout
            </h2>
            <?php
                foreach ( $overview as $index ):
                ?>

                    <?php foreach ( $index as $key => $value ): ?>
                        <?php if( $key == 'entry' ): ?>
                        <?php $entry_view = new BasketEntryView( $value ); ?>
                            <p> Quantity: <?php echo $entry_view->printAreaProductQuantity();?></p>
                            <p> Total Price: <?php echo $entry_view->printAreaProductTotalPrice();?></p>

                        <?php elseif( $key == 'model' ):?>
                            <?php $current_view = new ProductView( $value ); ?>

                                <a <?php echo $current_view->printAreaHrefLink(); ?> <?php echo $current_view->printAreaHrefLang();?>>
                                    <h4> <?php echo $current_view->printAreaTitle();?></h4>
                                    <p> <?php echo $current_view->printSummaryOfDescription();?></p>
                                </a>

                                <p> Product Price <?php echo $current_view->printFieldTypePrice();?></p>
                        <?php endif; ?>
                    <?php endforeach;?>

            <?php endforeach; ?>
        
        </main>
        
        <?php getFooter(); ?>
    </body>
</html>