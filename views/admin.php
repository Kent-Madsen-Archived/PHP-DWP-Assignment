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

            $operation_value = $router->getCurrentRoute()->getValidationTree()[2]->getValue();
            $id_value = $router->getCurrentRoute()->getValidationTree()[3]->getValue();
        ?>
    </head>
    <body>
        <?php getHeader(); ?>
        <nav>
            <div class="nav-wrapper">
                <ul>
                    <li>
                        <a href="/admin/news">
                            News
                        </a>
                    </li>
                    <li>
                        <a href="/admin/product">
                            Product
                        </a>
                    </li>
                    <li>
                        <a href="/admin/elements">
                            Elements
                        </a>
                    </li>
                    <li>
                        <a href="/admin/contact">
                            Contacts
                        </a>
                    </li>
                    <li>
                        <a href="/admin/image">
                            Image
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <main>
            <h3>
                Admin
            </h3>

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

                if( $view == 'elements' )
                {
                    include 'views/admin/elements.php';
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