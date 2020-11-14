<?php

class RouterValidateStringArgument
    extends RouterValidateArgument
{
    //
    public function validateArgumentLevel( $arg )
    {
        $value = filter_var( $arg, FILTER_SANITIZE_STRING );

        // Validate character set
        if( is_null( $arg ) | is_string( $value ) )
        {
            $this->setValue( $value );
            return true;
        }

        return false;
    }

}

?>