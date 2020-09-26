<?php require_once 'head.php'; ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="style.css">
        <title>
            Webshop
        </title>
    </head>
    <body>
        <?php require 'header.php'; ?>  
        <main>
        <?php 
        $connection = new mysqli('localhost', 'root', '', 'dwp_assignment');

        $sql = "SELECT * FROM product_view where identity=". $_GET['identity'] .";";
        $result = $connection->query($sql);?>

        <?php
        if ( $result->num_rows > 0 ): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <p> <?php echo $row["title"] ?> </p>
                <p> <?php echo $row["product_category"] ?> </p>
                <p> <?php echo $row["description"] ?> </p>

            <?php endwhile; ?>
        <?php endif; ?>

        <?php
            $connection->close();
        ?>

        </main>
        <?php require 'footer.php'; ?>  
    </body>
</html>