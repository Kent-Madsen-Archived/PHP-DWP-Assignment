<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface PersonAddressView
     */
    class PersonAddressView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }


        public function validateModel( $model )
         {
             $retval = false;
 
             if( $model instanceof PersonAddressModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }
        
    }
?>