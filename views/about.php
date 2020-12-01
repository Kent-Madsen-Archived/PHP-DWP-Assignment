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
        <?php $page_domain = new PageDomainDomain(); ?>

        <?php $element = $page_domain->retrievePageElementById(1); ?>

        <main>
            <div>
                <h2>
                    <?php echo $element->getTitle();?>
                </h2>


                <div>
                    <p> <?php echo $element->getCreatedOn(); ?></p>
                    <p> <?php echo $element->getLastUpdated(); ?></p>
                </div>

                <p>
                    <?php echo $element->getContent();?>
                </p>
            </div>

        </main>
        
        <?php getFooter(); ?>
    </body>
</html>