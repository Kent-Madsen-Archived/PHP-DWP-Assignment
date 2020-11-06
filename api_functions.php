<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    function api_headers()
    {
        header("Content-type: application/json; charset=utf-8");
    }

    function return_page( $object )
    {
        echo json_encode( $object );
    }
?>