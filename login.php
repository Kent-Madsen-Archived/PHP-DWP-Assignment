<?php require_once 'meta/main.php'; ?>

<?php if( isset( $_POST[ 'login' ] ) == true ): ?>
    <?php
    $connection = new mysqli('localhost', 'root', '', 'dwp_assignment');
    
    $sql = "select identity, username, password, email from profile where username=lower('". $_POST["username_input"] ."');";
    $result = $connection->query($sql);

    if ( $result->num_rows > 0 ) 
    {
        // output data of each row
        while( $row = $result->fetch_assoc() ) 
        {
            if( password_verify( $_POST['password_input'], $row['password'] ) )
            {
                // Congratulations, you're logged in.
                $_SESSION['profile_user_identity'] = $row['identity'];
                $_SESSION['profile_user_registered'] = date("Y-m-d H:i:s");
            }
        }
      } else {
        echo "0 results";
      }


    $connection->close();
    ?>
<?php endif; ?>

<?php if( !logged_in() ): ?>

<html <?php language('en'); ?> >
    <head>
        <?php require_once 'meta/head.php'; ?>
    </head>
    <body>
        <?php require 'header.php'; ?>  
        <main>
            <form class="login-form" method="post"> 
                <span> 
                    <input class="input" type="text" name="username_input" id ="username" placeholder="username">
                    <input class="input" type="password" name="password_input" id ="password" placeholder="password">
                </span>
                
                <span> 
                    <input type="submit" value="login" name="login" class="button">
                    <p> <a href="./register.php"> Register user </a> </p>
                <span>
            </form>
        </main>
        <?php require 'meta/footer.php'; ?>
    </body>
</html>
<?php else: ?>

<?php endif; ?>