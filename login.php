<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header> </header>
        <main> 
            <form id="login" method="post" action="./login_form.php"> 
                <h1> Login Form </h1>

                <span> 
                    <input class="input-area" type="text" name="form_username" placeholder="username">
                </span>
                
                <span>
                    <input class="input-area" type="password" name="form_password" placeholder="password">
                </span>

                <span>
                <!-- Forgot password? -->
                    <p> </p>

                </span>
                
                <span>
                    <input class="button" type="submit" value="login">
                </span>
            </form>
        </main>
        <footer> </footer>
    </body>
</html>