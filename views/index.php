<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */
     $title = PageTitleSingleton::getInstance();
     $title->appendToTitle( ' - Homepage' );
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="/assets/css/style.css">
        
        <?php 
            $title->printDocumentTitle();
        ?>
    </head>
    <body>
        <?php get_header(); ?>
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
        
        <?php get_footer(); ?>
    </body>
</html>