<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface PersonNameView
     */
    class PersonNameView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }


        public function validateModel( $model )
         {
             $retval = false;
 
             if( $model instanceof PersonNameModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }
        

    }
?>