<?php
    $router = RouterSingleton::getInstance()->getCurrentRoute();
    $id_value = $router->getValidationTree()[2]->getValue();

    $domain = new ProductDomain();

    $pf = $domain->getProductFactory();


    if( is_null( $id_value ) )
    {
        redirect_to_local_page('/product/pagination/1');
    }
    else
    {
        $pagination = $id_value - 1;
    }

    $products = $domain->retrieveProductsAt( ( $pagination ), 5);
?>

<div>
    <?php foreach ($products as $product): ?>
        <?php
            $view = new ProductView($product);
        ?>
        <a <?php echo $view->printAreaHrefLink(); echo $view->printAreaHrefLang(); ?>>
            <h5><?php echo $view->printAreaTitle();?></h5>
            <p> <?php echo $view->printSummaryOfDescription(); ?></p>
            <form method="post"
                  action="/product/buy">
                <input type="hidden" <?php echo $view->printAreaIdentity(); ?> name="product_basket_product_identity">
                <input type="hidden" value="1" placeholder="quantity" name="product_basket_number_of_products">
                <input type="hidden" value="<?php echo $view->printFieldTypePrice(); ?>" name="product_basket_price">

                <button class="waves-effect waves-light btn-small" name="product_basket_submit" value="1">
                    insert into Basket
                </button>
            </form>
        </a>

    <?php endforeach; ?>
</div>

<ul class="pagination">
    <li>
        <?php $previous_pagination = urlencode( $pf->getPaginationIndexCounter()->getCurrent()); ?>

        <?php if( !$pf->isPaginationIndexAtMinimumBoundary() ): ?>
            <a class="btn" href='<?php echo "/product/pagination/{$previous_pagination}";?>'>
                Previous
            </a>
        <?php else:?>
            <a class="btn disabled">
                Previous
            </a>
        <?php endif; ?>
    </li>

    <li>
        <?php echo strval( $pf->getPaginationIndexCounter()->projectIncrease(1 ) ); ?>
    </li>

    <li>
        <?php $next_pagination = urlencode($pf->getPaginationIndexCounter()->projectIncrease(2 )); ?>
        <?php if( !$pf->isPaginationIndexAtMaximumBoundary() ): ?>
            <a href="<?php echo "/product/pagination/{$next_pagination}";?>" class="btn">
                Next
            </a>
        <?php else:?>
            <a class="btn disabled">
                Next
            </a>
        <?php endif; ?>
    </li>

</ul>
