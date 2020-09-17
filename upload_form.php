
<?php 
require 'model/imagePostFactory.php';

if( isset( $_POST["submit"] ) )
{
    $uploaddir = "images/";
    $uploadfile = $uploaddir . basename($_FILES['fileImage']['name']);
    
    $is_ok = false;

    // Skal implementer en enumurator for file navne

    // moves file to desired folder
    if ( $is_ok && !( file_exists( $uploadfile ) ) )
    {
        move_uploaded_file($_FILES['fileImage']['tmp_name'], $uploadfile);
    }

    // File is at uploadfile
    

}
?>