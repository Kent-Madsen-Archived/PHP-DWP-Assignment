<?php 

    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface PersonEmailView
     */
    class PersonEmailView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }


        public function validateModel( $model )
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