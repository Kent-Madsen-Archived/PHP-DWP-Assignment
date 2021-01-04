<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class AssociatedCategoryView
     */
    class AssociatedCategoryView
    {
        /**
         * @param AssociatedCategoryController $controller
         */
        public function __construct( AssociatedCategoryController $controller )
        {
            $this->setController( $controller );
        }

        private $controller = null;


        /**
         * @param $model
         * @return bool
         */
        final public function validateModel( $model ): bool
        {
            $retval = false;

            if( $model instanceof AssociatedCategoryModel )
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
            if( $this->viewIsIdentityNull() )
            {
                return null;
            }

            return $this->getIdentity();
        }


        /**
         * @return bool|mixed
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->identity ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }

        /**
         * @return AssociatedCategoryController|null
         */
        public final function getController(): ?AssociatedCategoryController
        {
            return $this->controller;
        }

        /**
         * @param AssociatedCategoryController|null $controller
         */
        public final function setController( ?AssociatedCategoryController $controller ): void
        {
            $this->controller = $controller;
        }

    }
?>