<?php require_once 'meta/main.php'; ?>
<html <?php language('en'); ?> >
    <head>
        <?php $Title->insertAppendice('Products'); ?>
        <?php require_once 'meta/head.php'; ?>
    </head>
    <body>
        <?php require 'meta/header.php'; ?>  
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
        <?php require 'meta/footer.php'; ?>  
    </body>
</html>