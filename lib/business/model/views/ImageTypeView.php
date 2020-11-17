<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ImageTypeView
     */
    class ImageTypeView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }


        public function validateModel( $model )
         {
             $retval = false;
 
             if( $model instanceof ImageTypeModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }

    }
?>