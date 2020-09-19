<?php require 'main.php'; ?>
<?php 

if(is_logged_in())
{
    redirect("./index.php");
}

?>

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
            <form action="login_form.php" method="post">
                <input type="text" placeholder="username" name="username_form"> 
                <input type="password" placeholder="password" name="password_form"> 
                
                <input type="submit" value="Login User">
            </form>
        </main>

        
        <?php require "footer.php"; ?>
    </body>
</html>