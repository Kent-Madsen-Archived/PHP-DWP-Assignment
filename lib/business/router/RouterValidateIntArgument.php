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
         * @throws Exception
         */
        final public function validateArgumentLevel( $arg ): bool
        {
            $retVal = false;
            $value = filter_var( $arg, FILTER_VALIDATE_INT );

            if( is_null( $arg ) )
            {
                $this->setValue( null );
                $this->setIsValidated( false );

                return boolval( $retVal );
            }

            if( empty( $arg ) )
            {
                $this->setValue( null );
                $this->setIsValidated(false );

                return boolval( $retVal );
            }

            if( is_numeric( $value ) )
            {
                $this->setValue( $value );
                $this->setIsValidated(true );

                $retVal = true;
            }

            return boolval( $retVal );
        }

    }

?>