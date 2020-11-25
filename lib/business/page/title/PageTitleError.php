<?php 

    class PageTitleError
    {
        /**
         * @throws Exception
         */
        final public static function throwIsNotAnString()
        {
            throw new Exception('Input parameter is not a string');
        }


        /**
         * @throws Exception
         */
        final public static function throwIsNotAnArray()
        {
            throw new Exception('The parameter value is not an array');
        }


        /**
         * @throws Exception
         */
        final public static function throwIsNotAnInstanceOfPageTitle()
        {
            throw new Exception('Only instance of PageTitle is allowed');
        }

    }

?>