<?php
    /**
     *  Title: Admin
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    $domain = new AdminDomain();

    PageTitleController::getSingletonController()->append( ' - Admin Panel' );
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo encodingStandardHTML(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/style.css">
        
        <?php
            PageTitleView::getSingletonView()->printHTML();

            $router = RouterSingleton::getInstance();
            $value = $router->getCurrentRoute()->getValidationTree()[1]->getValue();
        ?>
    </head>
    <body>
        <?php getHeader(); ?>

        <main>
            <h2>
                Admin
            </h2>

            <?php
            if( isset( $value ) )
            {
                if( $value == 'contact' )
                {
                    include 'views/admin/contacts.php';
                }

                if( $value == 'news' )
                {
                    include 'views/admin/news.php';
                }

                if( $value == 'product' )
                {
                    include 'views/admin/products.php';
                }
            }
            ?>
        </main>
        
        <?php getFooter(); ?>
    </body>
</html>