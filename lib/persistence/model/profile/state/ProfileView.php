<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProfileView
     */
    class ProfileView
    {
        /**
         * @param ProfileController|null $controller
         */
        public function __construct( ?ProfileController $controller )
        {
            $this->setController( $controller );
        }

        private $controller = null;

        /**
         * @param ProfileController|null $controller
         */
        public final function setController( ?ProfileController $controller ): void
        {
            $this->controller = $controller;
        }

        /**
         * @return null
         */
        public final function getController(): ?ProfileController
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
 
            if( $model instanceof ProfileModel )
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