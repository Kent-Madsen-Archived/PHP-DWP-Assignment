<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class PersonAddressView
     */
    class PersonAddressView
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
 
             if( $model instanceof PersonAddressModel )
             {
                 $retval = true;
             }
 
             return boolval( $retval );
        }

        /**
         * @return int|mixed|null
         */
        final public function viewIdentity()
        {
            return $this->getIdentity();
        }


        /**
         * @return bool|mixed
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->identity ) == true )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }
        
    }
?>