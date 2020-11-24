<?php
    class RouterState
    {

        /**
         * @return string|null
         */
        public static function getRequest(): ?string
        {
            return $_SERVER[ S_REQUEST ];
        }


        /**
         * @return string|null
         */
        public static function getHost(): ?string
        {
            return $_SERVER[ S_HOST ];
        }

    }
?>