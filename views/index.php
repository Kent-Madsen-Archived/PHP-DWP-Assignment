<?php
    /**
     *  Title: Frontpage
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    PageTitleController::getSingletonController()->append( ' - Homepage' );
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="/assets/css/style.css">
        
        <?php
            PageTitleView::getSingletonView()->printHTML();
        ?>
    </head>
    <body>
        <?php getHeader(); ?>
        <main> 

<?php  
/**
            <?php $arrNews = $domain->frontpage_news(); ?>


            <section class="news"> 
                <?php 
                    foreach( $arrNews as $value ):
                ?>
                    <div> 
                        <p> <?php echo $value->getTitle(); ?> </p>
                        <p> <?php echo $value->getContent(); ?> </p>
                        <p> <?php echo $value->getCreatedOn(); ?></p>

                        <a href="<?php echo "./news/" . $value->getIdentity(); ?>">Read more</a>
                    </div>
                <?php 
                    endforeach;
                ?>
            </section>
             */?>
        </main>
        
        <?php getFooter(); ?>
    </body>
</html>