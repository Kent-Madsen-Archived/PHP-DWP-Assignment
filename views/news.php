<?php
    /**
     *  Title: News
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */
     
    PageTitleController::getSingletonController()->append( ' - News' );

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
                News
            </h3>

            <?php if(!isset($operation_value)): ?>
                <?php require 'views/news/page_frontpage.php'; ?>
            <?php endif; ?>

            <?php if($operation_value=='identity'): ?>
                <?php require 'views/news/page_view_article.php'; ?>
            <?php elseif ($operation_value=='pagination'):?>
                <?php  require 'views/news/page_view_pagination.php'; ?>
            <?php endif; ?>

        </main>
        
        <?php getFooter(); ?>
    </body>
</html>