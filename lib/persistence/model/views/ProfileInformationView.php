<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProfileInformationView
     */
    class ProfileInformationView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }

        public function validateModel( $model )
         {
             $retval = false;
 
             if( $model instanceof ProfileInformationModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }

    }
?>