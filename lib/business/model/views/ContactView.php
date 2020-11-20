<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ContactView
     */
     class ContactView
        extends BaseView
     {
         public function __constructor( $model )
         {
            $this->setModel( $model );
         }

         public function validateModel( $model )
         {
             $retval = false;
 
             if( $model instanceof ContactModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }
        
     }

?>