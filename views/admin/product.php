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
    if( isset( $operation ) )
    {
        if( $operation == 'create' )
        {
            include 'views/admin/product/create.php';
        }

        if( $operation == 'delete' )
        {
            include 'views/admin/product/delete.php';
        }

        if( $operation == 'update' )
        {
            include 'views/admin/product/update.php';
        }
    }

    $factory = new ProductFactory(
            new MySQLConnectorWrapper(
                    MySQLInformationSingleton::getSingleton()
            )
    );

    $factory->setPaginationIndex($pagination);

    $products = $factory->read();
?>
<?php if ( !isset( $operation ) ): ?>
    <ul>
        <?php foreach ( $products as $product ): ?>
            <li>
                <?php
                    $pId = $product->getIdentity();

                    $pTitle = $product->getTitle();
                    $pPrice = $product->getPrice();
                    $pDescription = $product->getDescription();

                    $updateLink = urlencode("/admin/product/update/{$pId}");
                    $deleteLink = urlencode("/admin/product/delete/{$pId}");
                ?>

                <?php echo "<p>Title: {$pTitle}</p>"?>
                <?php echo "<p>price: {$pPrice}</p>"; ?>
                <?php echo "<p>description: {$pDescription}</p>"; ?>

                <?php echo "<a class='btn' href={$updateLink} hreflang='en'> Update </a>"; ?>
                <?php echo "<a class='btn' href=\"{$deleteLink}\" hreflang='en'> Delete </a>"; ?>
            </li>
        <?php endforeach; ?>
    </ul>

    <form class="pagination" method="post" action="/admin/product">
        <input type="hidden" value="<?php echo $factory->getPaginationIndex(); ?>" name="admin_product_pagination_current">

        <li>
            <input type="submit" value="previous" class="btn" name="admin_product_pagination_previous">
        </li>

        <li>
            <?php echo ( $factory->getPaginationIndex() + 1 );?>
        </li>

        <li>
            <input type="submit" value="next" class="btn" name="admin_product_pagination_next">
        </li>
    </form>
<?php endif; ?>