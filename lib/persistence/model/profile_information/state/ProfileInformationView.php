<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProfileInformationView
     */
    class ProfileInformationView
    {
        /**
         * @param ProfileInformationController|null $controller
         */
        public function __constructor( ?ProfileInformationController $controller )
        {
            $this->setController( $controller );
        }

        private $controller = null;

        /**
         * @param ProfileInformationController|null $controller
         */
        public function setController( ?ProfileInformationController $controller ): void
        {
            $this->controller = $controller;
        }

        /**
         * @return ProfileInformationController|null
         */
        public function getController(): ?ProfileInformationController
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
 
            if( $model instanceof ProfileInformationModel )
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