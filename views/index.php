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
            <div class="frontpage">
                <a href="/homepage">
                    <div class="content">
                    </div>
                </a>
            </div>

            <section class="home-product-view">
                <h4>
                    Products
                </h4>

                <div class="home-product-container">
                    <?php
                        $pd = new ProductDomain();
                        $products = $pd->retrieveProductsAt(0, 4);

                        foreach ( $products as $product ):
                            $view = new ProductView( $product );
                    ?>
                        <div class="product">
                            <h5>
                                <?php echo $view->printAreaTitle(); ?>
                            </h5>

                            <p>
                                <?php echo $view->printSummaryOfDescription();?>
                            </p>

                            <p>
                                <?php echo $view->printFieldTypePrice() . " dkr.";?>
                            </p>

                            <div class="actions">
                                <a <?php echo $view->printAreaHrefLink(); echo $view->printAreaHrefLang();?> class="button"> View Product </a>
                            </div>
                        </div>

                    <?php endforeach; ?>
                </div>

                <div class="more">
                    <a href="/product/pagination/1" class="btn">
                        View More Products
                    </a>
                </div>
            </section>

            <section class="home-articles-view">
                <h3>
                    Articles
                </h3>

                <div class="home-article-container">
                    <?php
                    $news_domain = new NewsDomain();
                    $articles = $news_domain->retrieveArticlesAt(0, 3);

                    foreach ( $articles as $article ):?>
                        <div class="article">
                            <h4 class="title">
                                <?php echo $article->getTitle();?>
                            </h4>

                            <p class="content">
                                <?php echo $article->getContent();?>
                            </p>

                            <a href="<?php echo "/news/identity/{$article->getIdentity()}";?>" class="button">
                                View Article
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="more">
                    <a href="/news/pagination/1" class="button">
                        View More Articles
                    </a>
                </div>
            </section>

            <section class="home-about-us">
                <?php $page_domain = new PageDomain(); ?>
                <?php $element = $page_domain->retrievePageElementByAreaKey('page_about'); ?>

                <div class="area">
                    <h3 class="title">
                        <?php echo $element->getTitle();?>
                    </h3>
                    <p class="content">
                        <?php echo $element->getContent();?>
                    </p>
                </div>

                <div class="more">
                    <a class="button" href="/about">
                        read more
                    </a>
                </div>
            </section>

        </main>
        
        <?php getFooter(); ?>
    </body>
</html>