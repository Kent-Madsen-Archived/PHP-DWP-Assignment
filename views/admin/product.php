<?php
    if( isset( $_POST[ 'admin_product_pagination_current' ] ) )
    {
        $filtered_pagination_value = filter_var( $_POST[ 'admin_product_pagination_current' ], FILTER_VALIDATE_INT );
        $pagination = $filtered_pagination_value;
    }
    else
    {
        $pagination = 0;
    }

    if( isset( $_POST[ 'admin_product_pagination_previous' ] ) )
    {
        if( !( $pagination < 1 ) )
        {
            $pagination = $pagination - 1;
        }
    }

    if( isset( $_POST[ 'admin_product_pagination_next' ] ) )
    {
        $pagination = $pagination + 1;
    }
?>

<h3>
    Products
</h3>
<a href="/admin/product/create" hreflang="en" class="btn"> Create </a>

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

    $factory = new ProductFactory(
            new MySQLConnectorWrapper(
                    MySQLInformationSingleton::getSingleton()
            )
    );

    $factory->setPaginationIndexValue($pagination);

    $products = $factory->read();
?>
<?php if ( !isset( $operation_value ) ): ?>
    <ul>
        <?php if(!is_null( $products )): ?>
            <?php foreach ( $products as $product ): ?>
                <li>
                    <?php
                        $pId = $product->getIdentity();

                        $pTitle = $product->getTitle();
                        $pPrice = $product->getPrice();
                        $pDescription = $product->getDescription();

                        $updateLink = "/admin/product/update/{$pId}";
                        $deleteLink = "/admin/product/delete/{$pId}";
                    ?>

                    <?php echo "<p>Title: {$pTitle}</p>"?>
                    <?php echo "<p>price: {$pPrice}</p>"; ?>
                    <?php echo "<p>description: {$pDescription}</p>"; ?>

                    <?php echo "<a class='btn' href=\"{$updateLink}\" hreflang='en'> Update </a>"; ?>
                    <?php echo "<a class='btn' href=\"{$deleteLink}\" hreflang='en'> Delete </a>"; ?>
                </li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>

    <form class="pagination" method="post" action="/admin/product">
        <input type="hidden" value="<?php echo $factory->getPaginationIndexValue(); ?>" name="admin_product_pagination_current">

        <li>
            <?php if( !$factory->isPaginationIndexAtMinimumBoundary() ): ?>
                <button type="submit" value="previous" class="btn" name="admin_product_pagination_previous">
                    <span class="material-icons">
                        navigate_before
                    </span>
                </button>
            <?php else: ?>
                <button type="submit" value="previous" class="btn disabled">
                    <span class="material-icons">
                        navigate_before
                    </span>
                </button>
            <?php endif; ?>
        </li>

        <li>
            <?php echo ( $factory->getPaginationIndexValue() + 1 );?>
        </li>

        <li>
            <?php if( !$factory->isPaginationIndexAtMaximumBoundary() ): ?>
                <button type="submit" class="btn" name="admin_product_pagination_next">
                    <span class="material-icons">
                        navigate_next
                    </span>
                </button>
            <?php else: ?>
                <button type="submit" class="btn disabled">
                    <span class="material-icons">
                        navigate_next
                    </span>
                </button>
            <?php endif; ?>
        </li>
    </form>
<?php endif; ?>