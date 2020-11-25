<?php

    /**
     * Class SpoofSecurity
     */
    class SpoofSecurity
        extends Security
    {

        /**
         * @return bool
         */
        public function validateSecurity(): bool
        {
            $retVal = false;

            if( strlen( $this::getPostSecurityEmpty() ) == CONSTANT_ZERO )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return string|null
         */
        public static function getPostSecurityEmpty(): ?string
        {
            if( !self::existPostSecurityEmpty() )
            {
                return null;
            }

            if( is_null( $_POST[ 'security_empty' ] ) )
            {
                return null;
            }

            return strval( $_POST[ 'security_empty' ] );
        }


        /**
         * @return bool
         */
        public static function existPostSecurityEmpty(): bool
        {
            $retVal = false;

            if( isset( $_POST[ 'security_empty' ] ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }
    }

?>