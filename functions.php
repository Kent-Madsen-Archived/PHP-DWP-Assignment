<?php
    /**
     *  Title: Functions
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Page
     *  Project: DWP-Assignment
     */

    /**
     * @param $path_to_append
     * @return string
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

    /**
     * @param $url
     */
    function redirect_to_local_page( $url )
    {
        header( ( 'Location: ' . $url ), true, 302 );
    }

    /**
     * @param $protocol
     * @param $url
     */
    function redirect_to_external_page( $protocol, $url )
    {
        header( ('Location: ' . $protocol . '://' . $url) );
    }

    /**
     * @param $url
     */
    function redirect_to_external_page_insecure( $url )
    {
        redirect_to_external_page( 'http', $url );
    }

    /**
     * @param $url
     */
    function redirect_to_external_page_secure( $url )
    {
        redirect_to_external_page( 'https', $url );
    }
?>