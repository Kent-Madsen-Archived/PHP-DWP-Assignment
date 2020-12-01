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
        extends BaseMVCView
    {
        /**
         * @param PersonEmailModel|null $model
         * @throws Exception
         */
        public function __construct( ?PersonEmailModel $model )
        {
            $this->setModel( $model );
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