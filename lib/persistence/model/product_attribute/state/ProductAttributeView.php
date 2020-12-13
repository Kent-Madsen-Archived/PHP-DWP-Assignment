<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProductAttributeView
     */
    class ProductAttributeView
    {
        /**
         * @param ProductAttributeController|null $controller
         */
        public function __constructor( ?ProductAttributeController $controller )
        {

        }

        private $controller = null;

        /**
         * @return ProductAttributeController|null
         */
        public function getController():?ProductAttributeController
        {
            return $this->controller;
        }

        /**
         * @param ProductAttributeController|null $controller
         */
        public function setController( ?ProductAttributeController $controller ): void
        {
            $this->controller = $controller;
        }

        /**
         * @param $model
         * @return bool
         */
        final public function validateModel( $model ): bool
        {
            $retval = false;
 
            if( $model instanceof ProductAttributeModel )
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