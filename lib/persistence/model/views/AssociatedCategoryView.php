<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

     
    class AssociatedCategoryView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }
        
        public function validateModel( $model )
        {
            $retval = false;

            if( $model instanceof AssociatedCategoryModel )
            {
                $retval = true;
            }

            return boolval( $retval );
        }

    }
?>