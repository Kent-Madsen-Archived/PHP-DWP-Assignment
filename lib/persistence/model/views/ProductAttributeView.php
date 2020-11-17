<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductAttributeView
     */
    class ProductAttributeView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }

        public function validateModel( $model )
         {
             $retval = false;
 
             if( $model instanceof ProductAttributeModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }
        

    }
?>