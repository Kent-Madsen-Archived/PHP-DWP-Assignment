<?php require_once 'meta/main.php'; ?>

<html <?php language('en'); ?>>
    <head>
        <?php $Title->insertAppendice('Home'); ?>

        <?php require_once 'meta/head.php'; ?>
    </head>
    <body>
        <?php require 'meta/header.php'; ?>  
        <main>

        <div id="frontpage-product-page"> 
        <?php 
        $connection = new mysqli('localhost', 'root', '', 'dwp_assignment');

        $sql = "SELECT * FROM product_view order by registered desc limit 3;";
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
        </div>

        <div> 
<?php 
            $connection = new mysqli('localhost', 'root', '', 'dwp_assignment');
            
            $sql = "select * from article";
            $result = $connection->query($sql);
            
            if (($result->num_rows > 0) ):
                // output data of each row
                while($row = $result->fetch_assoc()):
        ?>
        <a href="article.php?identity=<?php echo $row['identity']; ?>""> 
            <div> 
                <h2> 
                    <?php echo $row['title']; ?>
                </h2>
                <p>
                    <?php echo $row['registered'] ?> 
                </p>
                <p> 
                    <?php echo $row['content']; ?>
                </p>
            </div>  
        </a>    

        <?php endwhile; ?>
        <?php endif; ?>


        <?php $connection->close(); ?> 
        
        </div>

        </main>
        <?php require 'meta/footer.php'; ?>  
    </body>
</html>