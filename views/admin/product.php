<?php
    $factory = GroupProduct::getProductFactory();
    $pag = new FactoryPagination( $factory );

    // Current Position
    if( isset( $_POST[ 'admin_product_pagination_current' ] ) )
    {
        $filtered_pagination_value = filter_var( $_POST[ 'admin_product_pagination_current' ], FILTER_VALIDATE_INT );
        $pagination = $filtered_pagination_value;
    }
    else
    {
        $pagination = $pag->viewCurrentPagination();
    }

    $factory->setPaginationIndexValue( $pagination );

    // Apply operation
    if( isset( $_POST[ 'admin_product_pagination_previous' ] ) )
    {
        $pagination = $pag->viewPreviousPagination();
    }

    if( isset( $_POST[ 'admin_product_pagination_next' ] ) )
    {
        $pagination = ($pag->viewNextPagination() );
    }

    $factory->setPaginationIndexValue( ($pagination - 1) );
?>

<h3>
    Products
</h3>
<a href="/admin/product/create" hreflang="en" class="button"> Create Product </a>

<?php
    if( isset( $operation_value ) )
    {
        if( $operation_value == 'create' )
        {
            include 'views/admin/product/create.php';
        }

        if( $operation_value == 'delete' )
        {
            include 'views/admin/product/delete.php';
        }

        if( $operation_value == 'update' )
        {
            include 'views/admin/product/update.php';
        }
    }



    $products = $factory->read();
?>
<?php if ( !isset( $operation_value ) ): ?>
    <ul>
        <?php if( !is_null( $products ) ): ?>
            <?php foreach ( $products as $product ): ?>
            <?php $current_view = new ProductView($product); ?>
                <li>
                    <?php
                        $pId = $product->getIdentity();

                        $pDescription = $product->getDescription();

                        $updateLink = "/admin/product/update/{$pId}";
                        $deleteLink = "/admin/product/delete/{$pId}";
                    ?>

                    <?php echo "<h4>{$current_view->printAreaTitle()}</h4>"?>
                    <?php echo "<p>{$current_view->printAreaPrice()}</p>"; ?>
                    <?php echo "<p> {$current_view->printSummaryOfDescription()}</p>"; ?>

                    <a <?php echo $current_view->printAreaHrefLink(); echo $current_view->printAreaHrefLang();?> class="button">View Product</a>
                    <?php echo "<a class='button' href=\"{$updateLink}\" hreflang='en'> Update Product</a>"; ?>
                    <?php echo "<a class='button' href=\"{$deleteLink}\" hreflang='en'> Delete Product</a>"; ?>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>

    <form class="pagination" method="post" action="/admin/product">
        <input type="hidden" value="<?php echo $pag->getPaginationIndex(); ?>" name="admin_product_pagination_current">

        <li>
            <?php if( !$pag->isPreviousMinimum() ): ?>
                <button type="submit" value="previous" class="button" name="admin_product_pagination_previous">
                    <span class="material-icons">
                        navigate_before
                    </span>
                </button>
            <?php else: ?>
                <button type="submit" value="previous" class="button disabled">
                    <span class="material-icons">
                        navigate_before
                    </span>
                </button>
            <?php endif; ?>
        </li>

        <li>
            <a class="button disabled">
                <?php echo $pag->viewCurrentPagination();?>
            </a>
        </li>

        <li>
            <?php if( !$pag->isNextMax() ): ?>
                <button type="submit" class="button" name="admin_product_pagination_next">
                    <span class="material-icons">
                        navigate_next
                    </span>
                </button>
            <?php else: ?>
                <button type="submit" class="button disabled">
                    <span class="material-icons">
                        navigate_next
                    </span>
                </button>
            <?php endif; ?>
        </li>
    </form>
<?php endif; ?>