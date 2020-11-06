<?php 
    require 'forms/contact_validation.php';

    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */
    $title = PageTitleSingleton::getInstance();
    $title->appendToTitle(' - Contact');
?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/assets/css/style.css">
        
    <?php 
        $title->printDocumentTitle();
    ?>
</head>
    <body>
        <?php get_header(); ?>

        <main> 
            <form method="post" 
                  action="./contact" 
                  onsubmit=""> 
                <h3> Contact us </h3>

                <input type="text" 
                       placeholder="E-mail">
                <label> From </label>

                <input type="text" 
                       placeholder="Subject">
                <label> Subject </label>

                <input type="text" 
                       placeholder="Message">
                <label> Message </label>

                <input class="btn" 
                       type="submit" 
                       value="send">
            </form>
        </main>
            
        <?php get_footer(); ?>
    </body>
</html>