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
    function getHeader()
    {
        require 'views/areas/header.php';
    }


    /**
     *
     */
    function getFooter()
    {
        require 'views/areas/footer.php';
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


    /**
     * @param $var
     */
    function debug_var( $var )
    {
        $code = var_export($var, true);
        echo "<pre>{$code}</pre>";
    }


    /**
     *
     */
    function bounce_link()
    {
        $url = $_SERVER['HTTP_REFERER'];
        redirect_to_local_page( $url );
    }


    /**
     * 
     */
    function getEncodingStandard(): string
    {
        return mb_internal_encoding();
    }


    /**
     * @return string
     */
    function encodingStandardHTML(): string
    {
        $var = '"' . htmlentities( getEncodingStandard(), null, 'UTF-8' ) . '"';
        return "<meta charset={$var}>";
    }
?>