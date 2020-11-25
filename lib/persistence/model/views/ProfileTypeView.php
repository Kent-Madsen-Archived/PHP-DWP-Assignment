<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * Class ProfileTypeView
     */
    class ProfileTypeView
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
 
             if( $model instanceof ProfileTypeModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
         }
        

    }
?>