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
    {
        /**
         * @param PageElementController|null $controller
         */
        public function __constructor( ?PageElementController $controller )
        {
            $this->setController( $controller );
        }

        private $controller = null;

        /**
         * @param PageElementController|null $controller
         */
        public function setController( ?PageElementController $controller ): void
        {
            $this->controller = $controller;
        }

        /**
         * @return null
         */
        public function getController():?PageElementController
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
 
             if( $model instanceof PageElementModel )
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