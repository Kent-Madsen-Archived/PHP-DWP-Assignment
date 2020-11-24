<?php

    /**
     * Class RouterValidateStringArgument
     */
    class RouterValidateStringArgument
        extends RouterValidateArgument
    {
        /**
         * @param $arg
         * @return bool
         */
        public function validateArgumentLevel( $arg ) : bool
        {
            $retVal = false;

            if( is_null( $arg ) )
            {
                $this->setValue(null );
                return boolval( $retVal );
            }

            $value = filter_var( $arg, FILTER_SANITIZE_STRING );

            // Validate character set
            if( is_string( $value ) )
            {
                $this->setValue( urldecode( $value ) );
                $this->setIsValidated(true );

                $retVal = true;
            }

            return boolval( $retVal );
        }

    }

?>