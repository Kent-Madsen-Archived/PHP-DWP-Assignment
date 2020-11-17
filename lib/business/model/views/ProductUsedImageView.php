<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductUsedImageView
     */
    class ProductUsedImageView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }

        public function validateModel( $model )
         {
             $retval = false;
 
             if( $model instanceof ProductUsedImageModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }

    }
?>