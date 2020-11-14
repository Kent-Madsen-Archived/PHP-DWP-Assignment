<?php

    /**
     * Class RouterValidateIntArgument
     */
    class RouterValidateIntArgument
        extends RouterValidateArgument
    {
        /**
         * @param $arg
         * @return bool
         */
        final public function validateArgumentLevel( $arg )
        {
            $value = filter_var( $arg, FILTER_VALIDATE_INT );

            if( empty( $arg ) )
            {
                $this->setValue( null );
                return true;
            }

            if( is_null( $arg ) || $value )
            {
                $this->setValue( $value );
                return true;
            }

            return false;
        }

    }

?>