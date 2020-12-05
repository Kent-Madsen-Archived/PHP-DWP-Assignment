<?php
    /**
     *  Title: Shop
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    $privileges = new AccessPrivilegesDomain();
    PageTitleController::getSingletonController()->append( ' - Shop' );
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

        <?php $productDomain = new ProductDomain(); ?>

        <?php $product_array_1 =$productDomain->retrieveProductsAt(0, 4);?>
        <?php $product_2 =$productDomain->retrieveProductsAt(1, 4);?>
        <?php $product_3 =$productDomain->retrieveProductsAt(2, 4);?>
        <?php $product_4 =$productDomain->retrieveProductsAt(3, 4);?>

        <main>
            <h2>
                Shop
            </h2>
            <section>
                <div>
                    <?php foreach ($product_array_1 as $product):?>
                        <?php $view = new ProductView($product); ?>
                        <div>
                            <h5><?php echo $view->printAreaTitle();?></h5>

                            <p>
                                <?php echo $view->printSummaryOfDescription();?>
                            </p>
                            <div>
                                <a class="btn" <?php echo $view->printAreaHrefLink(); echo $view->printAreaHrefLang();?>> View Product </a>
                            </div>
                            <div>
                                <?php if( $privileges->is_logged_in() ): ?>
                                    <form method="post"
                                          action="/product/buy">
                                        <input type="hidden" <?php echo $view->printAreaIdentity(); ?> name="product_basket_product_identity">
                                        <input type="hidden" value="1" placeholder="quantity" name="product_basket_number_of_products">
                                        <input type="hidden" value="<?php echo $view->printFieldTypePrice(); ?>" name="product_basket_price">

                                        <button class="waves-effect waves-light btn-small" name="product_basket_submit" value="1">
                                            insert into Basket
                                        </button>
                                    </form>
                                <?php endif;?>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
            </section>

            <section>
                <?php foreach ($product_2 as $product):?>
                    <?php $view = new ProductView($product); ?>
                    <div>
                        <h5><?php echo $view->printAreaTitle();?></h5>

                        <p>
                            <?php echo $view->printSummaryOfDescription();?>
                        </p>

                        <div>
                            <a class="btn" <?php echo $view->printAreaHrefLink(); echo $view->printAreaHrefLang();?>> View Product </a>
                        </div>
                        <div>
                            <?php if( $privileges->is_logged_in() ): ?>
                                <form method="post"
                                      action="/product/buy">
                                    <input type="hidden" <?php echo $view->printAreaIdentity(); ?> name="product_basket_product_identity">
                                    <input type="hidden" value="1" placeholder="quantity" name="product_basket_number_of_products">
                                    <input type="hidden" value="<?php echo $view->printFieldTypePrice(); ?>" name="product_basket_price">

                                    <button class="waves-effect waves-light btn-small" name="product_basket_submit" value="1">
                                        insert into Basket
                                    </button>
                                </form>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endforeach;?>
            </section>

            <section>
                <?php foreach ($product_3 as $product):?>
                    <?php $view = new ProductView($product); ?>
                    <div>
                        <h5><?php echo $view->printAreaTitle();?></h5>

                        <p>
                            <?php echo $view->printSummaryOfDescription();?>
                        </p>
                        <div>
                            <a class="btn" <?php echo $view->printAreaHrefLink(); echo $view->printAreaHrefLang();?>> View Product </a>
                        </div>
                        <div>
                            <?php if( $privileges->is_logged_in() ): ?>
                                <form method="post"
                                      action="/product/buy">
                                    <input type="hidden" <?php echo $view->printAreaIdentity(); ?> name="product_basket_product_identity">
                                    <input type="hidden" value="1" placeholder="quantity" name="product_basket_number_of_products">
                                    <input type="hidden" value="<?php echo $view->printFieldTypePrice(); ?>" name="product_basket_price">

                                    <button class="waves-effect waves-light btn-small" name="product_basket_submit" value="1">
                                        insert into Basket
                                    </button>
                                </form>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endforeach;?>
            </section>

            <section>
                <?php foreach ($product_4 as $product):?>
                    <?php $view = new ProductView($product); ?>
                    <div>
                        <h5><?php echo $view->printAreaTitle();?></h5>

                        <p>
                            <?php echo $view->printSummaryOfDescription();?>
                        </p>
                        <div>
                            <a class="btn" <?php echo $view->printAreaHrefLink(); echo $view->printAreaHrefLang();?>> View Product </a>
                        </div>
                        <div>
                            <?php if( $privileges->is_logged_in() ): ?>
                                <form method="post"
                                      action="/product/buy">
                                    <input type="hidden" <?php echo $view->printAreaIdentity(); ?> name="product_basket_product_identity">
                                    <input type="hidden" value="1" placeholder="quantity" name="product_basket_number_of_products">
                                    <input type="hidden" value="<?php echo $view->printFieldTypePrice(); ?>" name="product_basket_price">

                                    <button class="waves-effect waves-light btn-small" name="product_basket_submit" value="1">
                                        insert into Basket
                                    </button>
                                </form>
                            <?php endif;?>
                        </div>
                    </div>
                <?php endforeach;?>
            </section>

            <a href="/product/pagination/1" class="btn"> More Product </a>
        </main>
        
        <?php getFooter(); ?>
        
    </body>
</html>