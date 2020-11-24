<?php
    /**
     *  Title: Profile
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    $domain = new ProfileDomain();

    PageTitleController::getSingletonController()->append( ' - Profile' );
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo encodingStandardHTML(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/style.css">
        
        <?php
            PageTitleView::getSingletonView()->printHTML();
        ?>
    </head>
    <body>
        <?php getHeader(); ?>
        
        <main> 
            <h4> Welcome, <?php echo $_SESSION[ 'user_session_object_username' ]; ?> </h4>
            
            <div> 
                
            </div>
        </main>

        <?php getFooter(); ?>
    </body>
</html>