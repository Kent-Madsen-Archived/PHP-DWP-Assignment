<h3>Products</h3>
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
?>
