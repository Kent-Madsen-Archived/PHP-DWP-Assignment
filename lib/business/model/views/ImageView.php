<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ImageView
     */
    class ImageView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }


        public function validateModel( $model )
         {
             $retval = false;
 
             if( $model instanceof ImageModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }
    }
?>