<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProductEntityView
     */
    class ProductEntityView
    {
        /**
         * @param ProductEntityController|null $controller
         */
        public function __constructor( ?ProductEntityController $controller )
        {
            $this->setController( $controller );
        }

        private $controller = null;

        /**
         * @return ProductEntityController|null
         */
        public function getController(): ?ProductEntityController
        {
            return $this->controller;
        }

        /**
         * @param ProductEntityController|null $controller
         */
        public function setController( ?ProductEntityController $controller ): void
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
 
            if( $model instanceof ProductEntityModel )
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