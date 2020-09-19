<?php require 'main.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            DWP-Assignment
        </title>
    </head>
    <body>
        <?php require "header.php"; ?>

        <main> 
            <?php 
                require "model/imagePostFactory.php";
                $post = new ImagePostFactory;

                $varArgs = $post->read();


            ?>
        </main>
        
        <?php require "footer.php"; ?>

    </body>
</html>