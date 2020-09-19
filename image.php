<?php require 'main.php'; ?>
<?php require 'model/imagePostFactory.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php require "header.php"; ?>    

    <main> 
        <?php
        $test = new ImagePostFactory; 
        ?>
        <?php print_r($test->readWith($_GET["identity"])) ?>
    </main>

    <?php require "footer.php"; ?>
</body>
</html>