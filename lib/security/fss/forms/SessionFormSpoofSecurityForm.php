<?php
    abstract class SessionFormSpoofSecurityForm
    {
        /**
         * @return string|null
         */
        public final static function getSessionFSSToken(): ?string
        {
            if( !self::existSessionFSSToken() )
            {
                return null;
            }

            if( is_null( $_SESSION[ 'fss_token' ] ) )
            {
                return null;
            }

            return strval( $_SESSION[ 'fss_token' ] );
        }


        /**
         * @param $value
         * @return string|null
         * @throws Exception
         */
        public final static function setSessionFSSToken( $value ): ?string
        {
            if( is_null( $value ) )
            {
                $_SESSION[ 'fss_token' ] = null;
            }

            if( !is_string( $value ) )
            {
                SecurityErrors::throwErrorInputIsNotAnString();
            }

            $_SESSION[ 'fss_token' ] = $value;
            return self::getSessionFSSToken();
        }

        /**
         * @return bool
         */
        public final static function existSessionFSSToken(): bool
        {
            return boolval( isset( $_SESSION[ 'fss_token' ] ) );
        }

    }
?>