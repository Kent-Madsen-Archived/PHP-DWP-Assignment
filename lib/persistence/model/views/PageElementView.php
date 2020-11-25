<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class PageElementView
     */
    class PageElementView
        extends BaseView
    {
        /**
         * @param $model
         * @throws Exception
         */
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }


        /**
         * @param $model
         * @return bool
         */
        final public function validateModel( $model ): bool
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