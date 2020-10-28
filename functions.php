<?php 

function get_workspace_directory( $path_to_append )
{
    $append = null;

    if($path_to_append == null)
    {
        $append = "";
    }
    else 
    {
        $append = $path_to_append;
    }

    //
    $retvar = null;

    $retvar = getcwd();

    $retvar = $retvar . $append;

    return $retvar;
}


?>