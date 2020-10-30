<?php 

    /**
     * 
     */
    function get_workspace_directory_destination( $path_to_append )
    {
        $append = null;

        if( $path_to_append == null )
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

    /**
     * 
     */
    function get_footer()
    {
        require './areas/footer.php';
    }

    /**
     * 
     */
    function get_header()
    {
        require './areas/header.php';
    }
?>