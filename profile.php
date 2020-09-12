<?php 
session_start();

require_once 'model/ProfileInformationFactory.php';
require_once 'model/ProfileMailFactory.php';

$informationfactory = new ProfileInformationFactory;

$information = $informationfactory->find($_SESSION["id"]);

$mailFactory = new ProfileMailFactory;

$allMails = $mailFactory->findAllByProfileIdentity($_SESSION["id"]);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>My Profile</title>
    </head>
    <body>
        <header> 
        
        </header>
        
        <main> 
        </main>
        
        <footer> 
        </footer>
    </body>
</html>