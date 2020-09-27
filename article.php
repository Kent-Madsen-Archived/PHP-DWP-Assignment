<?php require_once 'meta/main.php'; ?>
<html lang="en">
    <head>
        <?php require_once 'meta/head.php'; ?>
    </head>
    <body>
        <?php require 'meta/header.php'; ?>  
        <main>
        <?php if(isset($_GET['identity'])): ?>
        <?php 
            $connection = new mysqli('localhost', 'root', '', 'dwp_assignment');
            
            $sql = "select * from article where identity=" . $_GET['identity'] . ";";
            $result = $connection->query($sql);
            
            if (($result->num_rows > 0) ):
                // output data of each row
                while($row = $result->fetch_assoc()):
        ?>
        <h2> 
            <?php echo $row['title']; ?>
        </h2>
        <p>
            <?php echo $row['registered'] ?> 
        </p>
        <p> 
            <?php echo $row['content']; ?>
        </p>

        <?php endwhile; ?>
        <?php endif; ?>


        <?php $connection->close(); ?> 
        <?php endif ?>
        </main>
        <?php require 'meta/footer.php'; ?>  
    </body>
</html>