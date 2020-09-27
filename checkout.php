<?php require_once 'head.php'; ?>
<?php 
if(isset($_POST['buy']))
{
    $connection = new mysqli('localhost', 'root', '', 'dwp_assignment');

    $stmt = $connection->prepare("INSERT INTO Invoice(profile_id) VALUES(?);");
    $stmt->bind_param("i", $invoice_stmt_profile);
    
    $invoice_stmt_profile = $_SESSION['profile_user_identity'];
    $stmt->execute();

    $invoice_query_id = $connection->insert_id;

    $stmt->close();

    $connection->close();

    foreach( $_SESSION['profile_checkout_bag'] as $value )
    {
        $connection_new = new mysqli('localhost', 'root', '', 'dwp_assignment');

        $sql = "INSERT INTO brought_product_order( invoice_id, product_id, quantity ) VALUES(?, ?, ?);";

        $stmt_new = $connection_new->prepare($sql);
        $stmt_new->bind_param("iii", $invoice_id, $product_id, $quantity);

        $invoice_id = $invoice_query_id;
        $product_id =  $value[0];
        $quantity = $value[1];

        $stmt_new->execute();

        $stmt_new->close();
        $connection_new->close();
    }

    unset($_SESSION['profile_checkout_bag']);
}
?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php require 'header.php'; ?>  
        <main>
            <?php if(isset($_SESSION['profile_checkout_bag'])): ?>
                <?php 
                    foreach($_SESSION['profile_checkout_bag'] as $value):
                ?>

                <?php 
                    $connection = new mysqli('localhost', 'root', '', 'dwp_assignment');
                    $sql = "SELECT * FROM product_view where identity=". $value[0] . ";";
                    $result = $connection->query($sql);
                ?>

                <?php
                    if ( $result->num_rows > 0 ): ?>
                        <?php while($row = $result->fetch_assoc()): ?> 
                            <p> <?php echo $value[1] ?> </p>
                            <p> <?php echo $row["title"] ?> </p>
                            <p> <?php echo $row["product_category"] ?> </p>
                        <?php endwhile; ?>
                    <?php endif; ?>

                <?php 
                    $connection->close();
                ?>

                <?php endforeach; ?>

                <form method="post"> 
                    <input type="submit" value="buy" name="buy"> 
                </form>

            <?php endif; ?>
        </main>
        <?php require 'footer.php'; ?>
    </body>
</html>