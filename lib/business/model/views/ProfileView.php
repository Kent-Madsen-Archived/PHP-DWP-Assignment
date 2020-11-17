<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProfileView
     */
    class ProfileView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }

        public function validateModel( $model )
         {
             $retval = false;
 
             if( $model instanceof ProfileModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }

    }

?>