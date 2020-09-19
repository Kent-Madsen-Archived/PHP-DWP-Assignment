<?php 
    require 'model/objects/profile.php';
 ?>
<?php require 'main.php'; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Galleri </title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php require "header.php"; ?>

        <?php require "model/imagePostFactory.php"; ?>
        
        <?php 
            $myPost = array();

            $factory = new ImagePostFactory;
            
            // Get my post
            foreach( $factory->read() as $value )
            {
                if($value->getProfileIdentity() == $_SESSION['current_profile']->getIdentity())
                {
                    array_push($myPost, $value);
                }
            }
        ?>

        <div class="gallery"> 
            <?php 
                foreach( $myPost as $value ):
            ?>
                <div class="image"> 
                    <img src="<?php echo $value->getSource(); ?>">

                </div>
            <?php endforeach; ?>
        
        </div>

        <?php require "footer.php"; ?>
    </body>
</html>