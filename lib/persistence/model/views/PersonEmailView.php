<?php 

    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class PersonEmailView
     */
    class PersonEmailView
        extends BaseView
    {
        /**
         * @param $model
         * @throws Exception
         */
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }


        /**
         * @param $model
         * @return bool
         */
        final public function validateModel( $model ): bool
         {
             $retval = false;
 
             if( $model instanceof PersonEmailModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }
        
    }

?>