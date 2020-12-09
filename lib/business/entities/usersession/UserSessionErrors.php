<?php
    class UserSessionErrors
    {
        public final static function throwErrorInputParameterIsNotInt()
        {
            throw new Exception('Invalid parameter value. Accepts Int or Null as value.');
        }


        public final static function throwErrorInputParameterIsNotString()
        {
            throw new Exception('Invalid parameter value. Accepts String or Null as value');
        }


        public final static function throwErrorInputParameterHasNoEntitiesInArray()
        {
            throw new Exception('Invalid Parameter value. Accepts only an variable that is of the type Array and has contents.');
        }


        public final static function throwErrorInputParameterIsNotAnInstanceOfProfileModelEntity()
        {
            throw new Exception('Invalid Parameter value. Accepts only an variable that is an instance of ProfileModelEntity');
        }


    }
?>