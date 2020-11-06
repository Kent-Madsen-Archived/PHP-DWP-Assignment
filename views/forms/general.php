<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */
    function validate_input_is_zero( $value )
    {
        return $value == 0;
    }

    function validate_input_is_null_or_zero_length( $value )
    {
        return ( $value == null || ( strlen( $value ) == 0 ) );
    }

    function validate_input_is_not_set( $value )
    {
        return !isset( $value );
    }
?>