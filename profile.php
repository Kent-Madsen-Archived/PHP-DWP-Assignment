<?php require_once 'head.php'; ?>

<?php 

require_once 'model/ProfileInformationFactory.php';
require_once 'model/ProfileMailFactory.php';

$informationfactory = new ProfileInformationFactory;

$information = $informationfactory->find($_SESSION["id"]);

$mailFactory = new ProfileMailFactory;

$allMails = $mailFactory->findAllByProfileIdentity($_SESSION["id"]);

?>

<html lang="<?php echo getLanguage(); ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Profile</title>
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
        <?php require_once 'header.php'; ?>
        <main> 
            <h2> Hej <?php echo $_SESSION['username']; ?> </h2>

            <div> 
                <!-- Emaill's -->
                <?php 
                foreach( $allMails as $value )
                {
                    echo $value->getProfileEmail();
                    echo "</br>";
                }
                ?>
            </div>
            
            <div> 
                <!-- Information -->
                <?php 
                    echo "</br>";

                    echo $information->getPersonName() . "</br>";
                    echo $information->getAddress() . "</br>";
                    echo $information->getPostZone() . "</br>";
                    echo $information->getCountry() . "</br>";
                    echo $information->getBirthday() . "</br>";
                
                ?>
            </div>

        </main>
        
        <?php require_once 'footer.php'; ?>
    </body>
</html>