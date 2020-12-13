<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProductCategoryView
     */
    class ProductCategoryView
        extends BaseMVCView
    {
        /**
         * @param ProductCategoryController|null $controller
         */
        public function __constructor( ?ProductCategoryController $controller )
        {
            $this->setController( $controller );
        }

        private $controller = null;

        /**
         * @return null
         */
        public function getController(): ?ProductCategoryController
        {
            return $this->controller;
        }

        /**
         * @param ProductCategoryController|null $controller
         */
        public function setController( ?ProductCategoryController $controller ): void
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
 
            if( $model instanceof ProductCategoryModel )
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