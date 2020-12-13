<?php
        $productDomain = new ProductDomain();
        $products = $productDomain->retrieveProducts();

        $privileges = new AccessPrivilegesDomain();
?>
<?php if ( !is_null( $products ) ): ?>
    <?php foreach ( $products as $current ):?>
            <?php
            $view = new ProductView( new ProductController( $current ) );
            ?>
            <div>
                    <h4>
                        <?php echo $view->printAreaTitle(); ?>
                    </h4>
                    <p>
                        <?php echo $view->printAreaDescription(); ?>
                    </p>
                    <p>
                        <?php echo $view->printAreaPrice(); ?>
                    </p>

                <?php if($privileges->is_logged_in()): ?>
                    <form method="post"
                          action="/product/buy">

                        <input type="hidden" <?php echo $view->printAreaIdentity(); ?> name="product_basket_product_identity">
                        <input type="number" value="1" placeholder="quantity" name="product_basket_number_of_products">
                        <input type="hidden" value="<?php echo $view->printFieldTypePrice(); ?>" name="product_basket_price">

                        <button class="button" name="product_basket_submit" value="1">
                            insert into Basket
                        </button>
                    </form>
                <?php endif; ?>

                <a class="button" <?php echo $view->printAreaHrefLink();?> <?php echo $view->printAreaHrefLang();?>>
                    view Product
                </a>

            </div>
    <?php endforeach; ?>
<?php endif; ?>


<div class="view">
    <a class="button" href="/product/pagination/1">
        View more products
    </a>
</div>