<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * Interface ProfileTypeView
     */
    class ProfileTypeView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }

        public function validateModel( $model )
         {
             $retval = false;
 
             if( $model instanceof ProfileTypeModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }
        

    }
?>