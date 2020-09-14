<?php require_once 'head.php'; ?>

<html lang="<?php echo getLanguage(); ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Duck Shop</title>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <?php require_once 'header.php'; ?>
        
        <main id="news"> 
        <?php require_once 'model/ArticlesFactory.php'; 
        $test = new ArticlesFactory;
        
        foreach( $test->getLatestNews() as $value )
        {
            echo "<div>";
                echo "<h2>" . $value->getTitle() . "</h2>";
                echo "<p>" . $value->getRegistered() . "</p>";
                echo "<p> " . $value->getContent() . "</p>";
            echo "</div>";
        }
        
        ?>
        </main>

        <?php require_once 'footer.php'; ?>
    </body>
</html>