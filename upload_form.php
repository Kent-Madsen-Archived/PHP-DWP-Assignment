
<?php 
require 'model/objects/profile.php';
require 'model/imagePostFactory.php';

require 'main.php';

if( isset( $_POST["submit"] ) )
{
    $uploaddir = "images/";
    
    $is_ok = true;
    
    // Skal implementer en enumurator for file navne
    $files_without = array_diff( scandir( $uploaddir ), array('.', '..'));

    $size = count( $files_without );

    $uploadfile = $uploaddir . $size . ".jpg";

    // moves file to desired folder
    if ( $is_ok && !( file_exists( $uploadfile ) ) )
    {
        move_uploaded_file( $_FILES['fileImage']['tmp_name'], $uploadfile );

        // File is at uploadfile
        $factory = new ImagePostFactory();

        $factory->create( $uploadfile, 
                          $_SESSION['current_profile']->getIdentity(), 
                          $_POST['fileTitle'], 
                          $_POST['description'] );

    }
}
?>