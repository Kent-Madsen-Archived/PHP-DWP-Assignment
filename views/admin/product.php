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

    $t = $factory->createModel();
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

                    $updateLink = "/admin/product/update/{$pId}";
                    $deleteLink = "/admin/product/delete/{$pId}";
                ?>

                <?php echo "<p>Title: {$pTitle}</p>"?>
                <?php echo "<p>price: {$pPrice}</p>"; ?>
                <?php echo "<p>description: {$pDescription}</p>"; ?>

                <?php echo "<a class='btn' href={$updateLink} hreflang='en'> Update </a>"; ?>
                <?php echo "<a class='btn' href=\"{$deleteLink}\" hreflang='en'> Delete </a>"; ?>

            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>