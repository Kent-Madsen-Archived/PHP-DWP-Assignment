<?php
    class ForgotDomainView
    {
        public static final function validateIsSubmitted(): bool
        {
            $retVal = false;

            if( isset( $_POST[ 'submit_forgot_form' ] ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }

    }
?>