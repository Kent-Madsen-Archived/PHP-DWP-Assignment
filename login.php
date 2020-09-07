<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
        <link rel="stylesheet" 
              href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
              integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
              crossorigin="anonymous">

        <title>
            <?php echo 'Login - DWP PHP Assignment'; ?>
        </title>
    </head>
    <body>
        <?php include_once './areas/header.php'; ?>
    
        <main> 
            <form class="form-signin"> 
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
