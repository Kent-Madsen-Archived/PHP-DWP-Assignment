<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface BroughtProductView
     */
    class BroughtProductView
        extends BaseView
    {
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }

        public function validateModel( $model )
        {
            $retval = false;

            if( $model instanceof BroughtProductModel )
            {
                $retval = true;
            }

            return boolval( $retval );
        }
        
    }
?>