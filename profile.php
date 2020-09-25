<?php require_once 'head.php'; ?>

<?php 

?>


<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="style.css">
        <title>
            Profile
        </title>
    </head>
    <body>
        <?php require 'header.php'; ?>  
        <main>
            <?php if(isset($_GET['identity'])): ?>
                <?php 
                    $connection = new mysqli('localhost', 'root', '', 'dwp_assignment');

                    $sql="select * from profile_information where profile_id=". $_GET['identity'] .";";
                    $result=$connection->query($sql);

                    if ( $result->num_rows > 0 ):?>
                <?php 
                    // output data of each row
                    while( $row = $result->fetch_assoc() ): ?>
                    <p> 
                        <span class="bold"> Firstname </span>: <?php echo $row['firstname']; ?> 
                    </p>
                    <p> 
                        <span class="bold"> Middlename </span>: <?php echo $row['middlename']; ?> 
                    </p>
                    <p> 
                        <span class="bold"> Lastname </span>: <?php echo $row['lastname']; ?> 
                    </p>
                    
                    <p> 
                        <span class="bold"> Phone Number </span>: <?php echo $row['phone_number']; ?> 
                    </p>
                    <p> 
                        <span class="bold"> Address </span>: <?php echo $row['address']; ?> 
                    </p>

                    <p> 
                        <span class="bold">Birthday </span>: <?php echo $row['birthday']; ?> 
                    </p>
                    
                    
                    <?php endwhile; ?>
                <?php endif; ?>
            <?php endif; ?>
        </main>
        <?php require 'footer.php'; ?>  
    </body>
</html>

<?php 
$connection->close(); 
?>