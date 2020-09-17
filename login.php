<?php require 'main.php'; ?>
<?php 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <main> 
            <form action="login_form.php" method="post">
                <input type="text" placeholder="username" name="username_form"> 
                <input type="password" placeholder="password" name="password_form"> 
                
                <input type="submit" value="Login User">
            </form>
        </main>
    </body>
</html>