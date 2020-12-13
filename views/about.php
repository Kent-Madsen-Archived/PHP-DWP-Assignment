<?php
    /**
     *  Title: About
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */
    
    PageTitleController::getSingletonController()->append( ' - About us' );
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
        <?php $page_domain = new PageDomain(); ?>

        <?php 
            $element = $page_domain->retrievePageElementByAreaKey('page_about'); 
            $opening_hours = $page_domain->retrievePageElementByAreaKey('opening_hours');
        ?>

        <main>
            <div>
                <h3>
                    <?php echo $element->getTitle();?>
                </h3>


                <div>
                    <p> <?php echo $element->getCreatedOn(); ?></p>
                    <p> <?php echo $element->getLastUpdated(); ?></p>
                </div>

                <p>
                    <?php echo $element->getContent();?>
                </p>
            </div>

            <div>
                <p> <?php echo $opening_hours->getTitle();?> </p>
                <p> <?php echo $opening_hours->getContent();  ?> </p>
            </div>

        </main>
        
        <?php getFooter(); ?>
    </body>
</html>