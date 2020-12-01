<?php
        $productDomain = new ProductDomain();
        $products = $productDomain->retrieveProducts();
?>

<?php if ( !is_null( $products ) ): ?>
    <?php foreach ( $products as $current ):?>
            <?php
            $view = new ProductView( $current );
            ?>
            <div>
                <a <?php echo $view->printAreaHrefLink();?> <?php echo $view->printAreaHrefLang();?>>
                    <p>
                        <?php echo $view->printAreaTitle(); ?>
                    </p>
                    <p>
                        <?php echo $view->printAreaDescription(); ?>
                    </p>
                    <p>
                        <?php echo $view->printAreaPrice(); ?>
                    </p>
                </a>

                <form method="post"
                      action="/product/buy">

                    <input type="hidden" <?php echo $view->printAreaIdentity(); ?> name="product_basket_product_identity">
                    <input type="number" value="1" placeholder="quantity" name="product_basket_number_of_products">
                    <input type="hidden" value="<?php echo $view->printFieldTypePrice(); ?>" name="product_basket_price">

                    <button class="waves-effect waves-light btn-small" name="product_basket_submit" value="1">
                        insert into Basket
                    </button>
                </form>
            </div>
    <?php endforeach; ?>
<?php endif; ?>


<a class="btn" href="/product/pagination/0">
    More
</a>
