<?php require_once 'head.php'; ?>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php require 'header.php'; ?>  
        <main>
            <form class="login-form" method="post"> 
                <input type="text" name="username_input" id ="username" placeholder="username">
                <input type="password" name="password_input" id ="password" placeholder="password">

                <input type="submit" value="login" name="login">
                <p> <a href="./register.php"> Register user </a> </p>
            </form>
        </main>
        <?php require 'footer.php'; ?>
    </body>
</html>