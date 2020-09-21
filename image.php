<?php require_once 'main.php'; ?>
<?php require_once 'model/imagePostFactory.php'; ?>

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
        <div class="onlyimage"> 
            <?php $obj = $test->readWith($_GET["identity"]); ?>
            <img src="<?php echo $obj->getSource(); ?>" />
            <div> 
                <p class="title"> <?php echo $obj->getTitle(); ?> </p>
                <p> <?php echo $obj->getSummary(); ?> </p>

                <!--- Actions --->
                <div> 
                    <?php require '_image_like_button.php'; ?>
                </div>
            </div>
            
        </div>
    </main>

    <?php require "footer.php"; ?>
</body>
</html>