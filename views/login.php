<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */
    require_once 'forms/login_validation.php';
    require_once 'forms/login_process_form.php';

    /**
     * 
     */
    $title = PageTitleSingleton::getInstance();
    $title->appendToTitle( ' - Login' );
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
            <form action="./login" method="post" onsubmit="validate_login();"> 
                <h4> Login </h4>

                <input type="text" 
                       id="form_login_username_id" 
                       name="form_login_username">
                <label> Username </label>

                <input type="password" 
                       id="form_login_password_id" 
                       name="form_login_password">
                <label> Password </label>
                
                <input class="btn" 
                       type="submit" 
                       value="Login" 
                       name="form_login_submit">

                <a href="./register"> Register new account </a>
                <a href="./forgot"> Forgot my password </a>

                <script src="./assets/javascript/login-validate-form.js" 
                        type="application/javascript">      
              </script>
            </form>
        </main>

        <?php get_footer(); ?>
    </body>
</html>