<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class PersonNameView
     */
    class PersonNameView
    {
        /**
         * @param PersonNameController|null $controller
         */
        public function __construct( ?PersonNameController $controller )
        {
            $this->setController( $controller );
        }

        //
        private $controller = null;

        /**
         * @return PersonNameController|null
         */
        public final function getController(): ?PersonNameController
        {
            return $this->controller;
        }

        /**
         * @param PersonNameController|null $controller
         */
        public final function setController( ?PersonNameController $controller ): void
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
 
            if( $model instanceof PersonNameModel )
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