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

            if( strlen( PostSpoofSecurityForm::getPostSecurityEmpty() ) == CONSTANT_ZERO )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }



    }

?>