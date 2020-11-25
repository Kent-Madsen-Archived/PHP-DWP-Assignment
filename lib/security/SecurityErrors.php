<?php

    class SecurityErrors
    {
        /**
         * @throws Exception
         */
        final public static function throwErrorInputIsNotAnString()
        {
            throw new Exception('Input Value: is not an string');
        }


        /**
         * @throws Exception
         */
        final public static function throwErrorTokenIsNull()
        {
            throw new Exception('');
        }


        /**
         * @throws Exception
         */
        final public static function throwErrorUrlIsValid()
        {
            throw new Exception('error, url is not valid' );
        }


        /**
         * @throws Exception
         */
        final public static function throwErrorParameterIsNull()
        {
            throw new Exception('parameter can not be null');
        }


        /**
         * @throws Exception
         */
        final public static function throwErrorParameterIsNotAString()
        {
            throw new Exception('parameter is not a string' );
        }


        /**
         * @throws Exception
         */
        final public static function throwErrorCapchaFailed()
        {
            throw new Exception( 'Security Error: Capcha failed' );
        }


        /**
         * @throws Exception
         */
        final public static function throwErrorParameterIsNotAArray()
        {
            throw new Exception('only an array is allowed as parameter');
        }


        /**
         * @throws Exception
         */
        final public static function throwCantCalculateDifference()
        {
            throw new Exception('can\'t calculate difference as either now or timespan is null ');
        }


        /**
         *
         */
        final public static function throwErrorParameterIsNotInt()
        {
            throw new Exception('only int is allowed as parameter');
        }

    }

?>