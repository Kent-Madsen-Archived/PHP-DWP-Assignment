<?php

abstract class PostReCaptchaV2
{
    /**
     * @return string|null
     */
    public final static function getPostKey(): ?string
    {
        if( is_null( $_POST[ 'g-recaptcha-response' ] ) )
        {
            return null;
        }

        return strval( $_POST[ 'g-recaptcha-response' ] );
    }
}

?>