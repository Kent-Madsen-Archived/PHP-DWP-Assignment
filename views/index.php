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
            <h1>
                DWP - Assignment
            </h1>

            <h2>
                Homepage
            </h2>

            <section>
                <h3>
                    Products
                </h3>

                <div>
                    <?php
                        $pd = new ProductDomain();
                        $products = $pd->retrieveProductsAt(0, 4);

                        foreach ( $products as $product ):
                            $view = new ProductView( $product );
                    ?>
                        <div>
                            <h4>
                                <?php echo $view->printAreaTitle(); ?>
                            </h4>

                            <p>
                                <?php echo $view->printSummaryOfDescription();?>
                            </p>

                            <p>
                                <?php echo $view->printFieldTypePrice() . " dkr.";?>
                            </p>

                            <a <?php echo $view->printAreaHrefLink(); echo $view->printAreaHrefLang();?> class="btn"> View Product </a>
                        </div>

                    <?php endforeach; ?>
                </div>

                <a href="/product/pagination/1" class="btn">
                    View More Products
                </a>
            </section>

            <section>
                <h3>
                    Articles
                </h3>

                <div>
                    <?php
                    $news_domain = new NewsDomain();

                    $articles = $news_domain->retrieveArticlesAt(0, 3);

                    foreach ($articles as $article):?>
                        <div>
                            <h4><?php echo $article->getTitle();?></h4>
                            <p>
                                <?php echo $article->getContent();?>
                            </p>

                            <a href="<?php echo "/news/identity/{$article->getIdentity()}";?>" class="btn">
                                View Article
                            </a>

                        </div>
                    <?php endforeach; ?>
                </div>

                <a href="/news/pagination/1" class="btn">
                    View More Articles
                </a>
            </section>

            <section>
                <?php $page_domain = new PageDomainDomain(); ?>
                <?php $element = $page_domain->retrievePageElementByAreaKey('page_about'); ?>

                <div>
                    <h3>
                        <?php echo $element->getTitle();?>
                    </h3>

                    <p>
                        <?php echo $element->getContent();?>
                    </p>
                </div>

                <a class="btn" href="/about">
                    read more
                </a>
            </section>

        </main>
        
        <?php getFooter(); ?>
    </body>
</html>