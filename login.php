<!DOCTYPE html>
<html lang="en">
    <?php include_once './areas/head.php'; ?>

    <body>
        <?php include_once './areas/header.php'; ?>
    
        <main> 
            <form class="form-signin" method="post" action="./backend/credentiels.php"> 
                <h1> Login </h1>
                <p> Please type in your login information. </p>
                
                <hr>
                
                <span> 
                    <label> Username </label>
                    <input type="Text" placeholder="" name="" id="" required> 
                </span>

                <span> 
                    <label> Password </label>
                    <input type="password" placeholder="" name="" id="" required> 
                </span>

                <button type="submit" class="btn btn-lg btn-primary btn-block" > Log in </button>
            </form>
        </main>
    
        <?php include_once './areas/footer.php'; ?>
    </body>

</html>
