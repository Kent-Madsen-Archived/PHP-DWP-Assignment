<?php
    $router = RouterSingleton::getInstance()->getCurrentRoute();
    $id_value = $router->getValidationTree()[2]->getValue();

    $domain = new ProductDomain();
    $product = $domain->readSingularProduct( $id_value );

    $view = new ProductView( $product );
?>

<?php if( !is_null( $product->getTitle() ) ): ?>
    <h4>
        <?php echo $view->printAreaTitle(); ?>
    </h4>

    <p>
        <?php echo $view->viewDescription(); ?>
    </p>

    <p>
        <?php echo $view->printFieldTypePrice();?>
    </p>

    <form method="post"
          action="/product/buy">

        <input type="hidden" <?php echo $view->printAreaIdentity(); ?> name="product_basket_product_identity">

        <input type="number" value="1" placeholder="quantity" name="product_basket_number_of_products">

        <input type="hidden" value="<?php echo $view->printFieldTypePrice(); ?>" name="product_basket_price">

        <button class="waves-effect waves-light btn-small" name="product_basket_submit" value="1">
            insert into Basket
        </button>
    </form>

<?php endif; ?>