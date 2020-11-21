<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProductEntityView
     */
    class ProductEntityView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }
        

        public function validateModel( $model )
         {
             $retval = false;
 
             if( $model instanceof ProductEntityModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }
    }
?>