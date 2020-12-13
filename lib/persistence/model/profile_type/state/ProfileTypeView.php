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
    {
        /**
         * @param ProfileTypeController|null $controller
         */
        public function __constructor( ?ProfileTypeController $controller )
        {
            $this->setController( $controller );
        }

        private $controller = null;

        /**
         * @param ProfileTypeController|null $controller
         */
        public function setController( ?ProfileTypeController $controller ): void
        {
            $this->controller = $controller;
        }

        /**
         * @return null
         */
        public function getController(): ?ProfileTypeController
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
 
            if( $model instanceof ProfileTypeModel )
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