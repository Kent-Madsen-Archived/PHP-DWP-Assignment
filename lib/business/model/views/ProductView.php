<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductView
     */
    class ProductView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }

        public function validateModel( $model )
        {
             $retval = false;
 
             if( $model instanceof ProductModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
        }
               
    }
?>