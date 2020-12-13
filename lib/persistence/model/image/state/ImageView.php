<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ImageView
     */
    class ImageView
    {
        /**
         * @param ImageController|null $controller
         */
        public function __construct( ?ImageController $controller )
        {
            $this->setController( $controller );
        }

        private $controller = null;

        /**
         * @param ImageController|null $controller
         */
        public function setController( ?ImageController $controller ): void
        {
            $this->controller = $controller;
        }

        /**
         * @return ImageController|null
         */
        public function getController(): ?ImageController
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
 
            if( $model instanceof ImageModel )
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