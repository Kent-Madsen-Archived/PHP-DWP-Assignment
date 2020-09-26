<?php require_once 'head.php'; ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="style.css">
        <title>
            News
        </title>
    </head>
    <body>
        <?php require 'header.php'; ?>  
        <main>
        <?php 
        $connection = new mysqli('localhost', 'root', '', 'dwp_assignment');

        $sql = "SELECT * FROM product_view;";
        $result = $connection->query($sql);?>

<?php
        if ( $result->num_rows > 0 ): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <a href="product.php?identity=<?php echo $row["identity"]; ?>"> 
                <p> <?php echo $row["title"] ?> </p>
                <p> <?php echo $row["product_category"] ?> </p>
                <p> <?php echo $row["description"] ?> </p>
            </a>

            <?php endwhile; ?>
        <?php endif; ?>

        <?php
            $connection->close();
        ?>
                
        </main>
        <?php require 'footer.php'; ?>  
    </body>
</html>