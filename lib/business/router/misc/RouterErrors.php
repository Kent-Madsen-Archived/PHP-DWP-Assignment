<?php

    /**
     * Class RouterErrors
     */
    class RouterErrors
    {
        /**
         * @throws Exception
         */
        final public static function throwIsNotInstanceOfRoute()
        {
            throw new Exception('input parameter');
        }


        /**
         * @throws Exception
         */
        final public static function throwIsNotAnArray()
        {
            throw new Exception();
        }


        /**
         * @throws Exception
         */
        final public static function throwIsNotAnString()
        {
            throw new Exception('parameter value: only strings are allowed');
        }


        /**
         * @throws Exception
         */
        final public static function throwIsOutOfIndexBoundary()
        {
            throw new Exception('$idx is outside of the arguments range');
        }


        /**
         * @throws Exception
         */
        final public static function throwIsNotAnInstanceOfRouterValidateArgument()
        {
            throw new Exception('Parameter value is not an instance of RouterValidateArgument');
        }


        /**
         * @throws Exception
         */
        final public static function throwIsNotAnBoolean()
        {
            throw new Exception('only boolean is allowed' );
        }


        /**
         * @throws Exception
         */
        final public static function throwIsNotAnInstanceOfRouter()
        {
            throw new Exception('Error, Router set instance');
        }


        /**
         * @throws Exception
         */
        final public static function throwOnlyIntIsAllowed()
        {
            throw new Exception('parameter value - lvl: only int is allowed');
        }
    }
?>