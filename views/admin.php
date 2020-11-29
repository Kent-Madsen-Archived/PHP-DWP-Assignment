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
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        
        <?php
            PageTitleView::getSingletonView()->printHTML();

            $router = RouterSingleton::getInstance();

            $view = $router->getCurrentRoute()->getValidationTree()[1]->getValue();
            $operation = $router->getCurrentRoute()->getValidationTree()[2]->getValue();
            $id = $router->getCurrentRoute()->getValidationTree()[3]->getValue();
        ?>
    </head>
    <body>
        <?php getHeader(); ?>

        <main>
            <h2>
                Admin
            </h2>

            <?php
            if( isset( $view ) )
            {
                if( $view == 'contact' )
                {
                    include 'views/admin/contact.php';
                }

                if( $view == 'news' )
                {
                    include 'views/admin/news.php';
                }

                if( $view == 'product' )
                {
                    include 'views/admin/product.php';
                }
            }
            ?>
        </main>
        
        <?php getFooter(); ?>
    </body>
</html>