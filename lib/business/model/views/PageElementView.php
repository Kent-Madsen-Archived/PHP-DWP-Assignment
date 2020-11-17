<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface PageElementView
     */
    class PageElementView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }

        public function validateModel( $model )
         {
             $retval = false;
 
             if( $model instanceof PageElementModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }
    }
?>