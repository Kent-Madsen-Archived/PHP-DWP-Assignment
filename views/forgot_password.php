<?php
    require 'forms/forgot_my_password_validation.php';

    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    $title = PageTitleSingleton::getInstance();
    $title->appendToTitle( ' - Forgot my password' );
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
                  action="./forgot-my-password" 
                  onsubmit=""> 
                  
                <h3>Forgot my password</h3>

                <input type="text" 
                       placeholder="E-mail"
                       name="forgot_form_email">

                <label> E-mail to your account </label>
            
                <input class="btn" type="submit" value="send"> </input>
            </form>
        </main>

        <?php get_footer(); ?>
    </body>
</html>