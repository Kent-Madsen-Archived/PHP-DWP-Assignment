<?php require 'main.php'; ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <main> 
            <form action="register_form.php" method="post">
                <input type="text" placeholder="username" name="username_form"> 
                
                <input type="text" placeholder="e-mail" name="email_form"> 

                <input type="password" placeholder="password" name="password1_form">
                <input type="password" placeholder="password" name="password2_form"> 
                
                <input type="submit" value="Register Username">
            </form>
        </main>
    </body>
</html>