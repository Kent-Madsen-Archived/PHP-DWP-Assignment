<?php

    /**
     * Class RouterErrors
     */
    class RouterErrors
    {
        /**
         * @throws Exception
         */
        public static function throwIsNotInstanceOfRoute()
        {
            throw new Exception('input parameter');
        }


        /**
         * @throws Exception
         */
        public static function throwIsNotAnArray()
        {
            throw new Exception();
        }


        /**
         * @throws Exception
         */
        public static function throwIsNotAnString()
        {
            throw new Exception('parameter value: only strings are allowed');
        }


        /**
         * @throws Exception
         */
        public static function throwIsOutOfIndexBoundary()
        {
            throw new Exception('$idx is outside of the arguments range');
        }
    }
?>