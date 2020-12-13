<?php
    $router = RouterSingleton::getInstance()->getCurrentRoute();
    $id_value = $router->getValidationTree()[2]->getValue();

    $domain = new ProductDomain();

$privileges = new AccessPrivilegesDomain();

    $pf = GroupProduct::getProductFactory();

    $pag = new FactoryPagination($pf);
    $pag->setBase('/product/pagination/');


    if( is_null( $id_value ) )
    {
        redirect_to_local_page($pag->generateLink(1));
    }
    else
    {
        $pagination = $id_value - 1;
    }

    $products = $domain->retrieveProductsAt( $pagination, 5);
?>

<?php if( !is_null( $products ) ): ?>
    <div class="product-page">
        <?php foreach ( $products as $product ): ?>
            <div class="product">
                <?php
                    $view = new ProductView( $product );
                ?>
                    <h5><?php echo $view->printAreaTitle();?></h5>
                    <p> <?php echo $view->printSummaryOfDescription(); ?></p>

                <div class="more">
                    <div class="buy">
                        <?php if($privileges->is_logged_in()): ?>
                            <form method="post"
                                  action="/product/buy">
                                <input type="hidden" <?php echo $view->printAreaIdentity(); ?> name="product_basket_product_identity">
                                <input type="hidden" value="1" placeholder="quantity" name="product_basket_number_of_products">
                                <input type="hidden" value="<?php echo $view->printFieldTypePrice(); ?>" name="product_basket_price">

                                <button class="button" name="product_basket_submit" value="1">
                                    insert into Basket
                                </button>
                            </form>
                        <?php endif; ?>
                    </div>

                    <div class="view">
                        <a class="button" <?php echo $view->printAreaHrefLink(); echo $view->printAreaHrefLang(); ?>>
                            View Product
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<ul class="pagination-area">
    <li>
        <?php $previous_pagination = $pag->viewPreviousPagination() ?>

        <?php if( !$pag->isPreviousMinimum() ): ?>
            <a class="button-pagination" href='<?php echo $pag->generateLink($previous_pagination);?>'>
                Previous
            </a>
        <?php else:?>
            <a class="button-pagination disabled">
                Previous
            </a>
        <?php endif; ?>
    </li>

    <li>
        <a class="button-pagination disabled">
            <?php echo $pag->viewCurrentPagination();?>
        </a>
    </li>

    <li>
        <?php $next_pagination = $pag->viewNextPagination(); ?>

        <?php if( !$pag->isNextMax() ): ?>
            <a href="<?php echo $pag->generateLink($next_pagination)?>" class="button-pagination">
                Next
            </a>
        <?php else:?>
            <a class="button-pagination disabled">
                Next
            </a>
        <?php endif; ?>
    </li>

</ul>
