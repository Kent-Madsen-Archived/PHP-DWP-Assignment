<!DOCTYPE html>
<html lang="en">
    <?php include_once './areas/head.php'; ?>

    <body>
        <?php include_once './areas/header.php'; ?>
    
        <main> 
            <form class="form-signin" method="post" action="./backend/credentiels_register.php"> 
                <h1> Register </h1>
                <p> Please type in your information to register an account. </p>
                
                <hr>
                
                <span> 
                    <label> Username </label>
                    <input type="Text" placeholder="" name="" id="" required> 
                </span>

                <span> 
                    <label> Password </label>
                    <input type="password" placeholder="" name="" id="" required> 
                </span>

                <span> 
                    <label> Name </label>
                    <input type="Text" placeholder="" name="" id="" required> 
                </span>

                <span> 
                    <label> Age </label>
                    <input type="Text" placeholder="" name="" id="" required> 
                </span>

                <span> 
                    <label> E-mail </label>
                    <input type="Text" placeholder="" name="" id="" required> 
                </span>

                <span> 
                    <label> Address </label>
                    <input type="Text" placeholder="" name="" id="" required> 
                </span>

                <span> 
                    <label> Post zone </label>
                    <input type="Text" placeholder="" name="" id="" required> 
                </span>

                <span> 
                    <label> Country </label>
                    <input type="Text" placeholder="" name="" id="" required> 
                </span>





                <button type="submit" class="btn btn-lg btn-primary btn-block" > register </button>
            </form>
        </main>
    
        <?php include_once './areas/footer.php'; ?>
    </body>

</html>
