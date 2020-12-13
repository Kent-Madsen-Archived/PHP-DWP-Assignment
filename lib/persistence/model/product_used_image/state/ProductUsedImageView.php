<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProductUsedImageView
     */
    class ProductUsedImageView
    {
        /**
         * @param $controller
         * @throws Exception
         */
        public function __construct( ?ProductUsedImageController $controller )
        {
            $this->setController($controller);
        }

        private $controller = null;

        /**
         * @param ProductUsedImageController|null $controller
         */
        public function setController( ?ProductUsedImageController $controller): void
        {
            $this->controller = $controller;
        }

        /**
         * @return ProductUsedImageController|null
         */
        public function getController():?ProductUsedImageController
        {
            return $this->controller;
        }


        /**
         * @param $model
         * @return bool
         */
        final public function validateModel( $model ): bool
        {
            $retval = false;
 
            if( $model instanceof ProductUsedImageModel )
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