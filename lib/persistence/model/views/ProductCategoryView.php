<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductCategoryView
     */
    class ProductCategoryView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }

        public function validateModel( $model )
         {
             $retval = false;
 
             if( $model instanceof ProductCategoryModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }
        

    }
?>