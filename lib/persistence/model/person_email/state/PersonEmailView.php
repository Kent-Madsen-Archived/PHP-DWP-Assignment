<?php 

    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class PersonEmailView
     */
    class PersonEmailView
    {
        /**
         * PersonEmailView constructor.
         * @param PersonEmailController|null $controller
         */
        public function __construct( ?PersonEmailController $controller )
        {
            $this->setController( $controller );
        }

        private $controller = null;

        /**
         * @param PersonEmailController|null $controller
         */
        public function setController( ?PersonEmailController $controller ): void
        {
            $this->controller = $controller;
        }

        /**
         * @return null
         */
        public function getController(): ?PersonEmailController
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
 
            if( $model instanceof PersonEmailModel )
            {
                $retval = true;
            }
 
            return boolval( $retval );
        }


        /**
         * @return mixed
         * @throws Exception
         */
        final public function viewIdentity()
        {
            return $this->getModel()->getIdentity();
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->getModel()->getIdentity() ) == true )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }

        final public function printEmailArea()
        {
            $f = htmlentities($this->getModel()->getContent());
            return "{$f}";
        }

        /**
         * @return string
         */
        final public function printInteractiveEmail()
        {
            return $this->printInteractiveEmailArea( $this->printEmailArea() );
        }

        /**
         * @return string
         */
        final public function printInteractiveEmailArea( $message )
        {
            $fm = htmlentities($message);
            $html = "<a href='mailto:{$this->printEmailArea()}'>{$fm}</a>";
            return $html;
        }
        
    }

?>