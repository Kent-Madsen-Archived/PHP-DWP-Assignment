<?php
    abstract class SessionBasketForm
    {
        public const key = "profile_basket";

        public static final function getBasketValues(): ?array
        {
            if( !self::existBasketValues() )
            {
                return null;
            }

            return $_SESSION[self::key];
        }

        public static final function setBasketValues( ?array $values ): void
        {
            $_SESSION[self::key] = $values;
        }

        public static final function clearBasketValues(): void
        {
            unset( $_SESSION[ self::key ] );
        }

        public static final function existBasketValues(): bool
        {
            return isset($_SESSION[self::key]);
        }
    }
?>