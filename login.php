<?php require_once 'head.php'; ?>

<?php if( isset( $_POST[ 'login' ] ) == true ): ?>
    <?php 
    $connection = new mysqli('localhost', 'root', '', 'dwp_assignment');
    
    $sql = "select identity, username, password, email from profile where username='". $_POST["username_input"] ."';";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
            if( password_verify( $_POST['password_input'], $row['password'] ) )
            {
                // Congratulations, you're logged in.
            }
        }
      } else {
        echo "0 results";
      }


    $connection->close();
    ?>
<?php endif; ?>

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