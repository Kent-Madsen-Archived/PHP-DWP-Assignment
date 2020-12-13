<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ImageTypeView
     */
    class ImageTypeView
    {
        /**
         * @param ImageTypeController $controller
         */
        public function __constructor( ImageTypeController $controller )
        {
            $this->setController( $controller );
        }

        private $controller = null;

        /**
         * @param ImageTypeController|null $controller
         */
        public function setController( ?ImageTypeController $controller ): void
        {
            $this->controller = $controller;
        }

        /**
         * @return null
         */
        public function getController():?ImageTypeController
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
 
             if( $model instanceof ImageTypeModel )
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