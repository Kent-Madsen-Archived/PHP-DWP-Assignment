<?php

    /**
     * Class PersonEmailModel
     */
    class PersonEmailModel
        extends DatabaseModelEntity
    {
        // Constructor
        /**
         * PersonEmailModel constructor.
         * @param PersonEmailFactory|null $factory
         * @throws Exception
         */
        public function __construct( ?PersonEmailFactory $factory )
        {
            $this->setFactory( $factory );
        }


        /**
         * @return bool
         */
        final public function requiredFieldsValidated(): bool
        {
            $retVal = !is_null($this->content);

            return $retVal;
        }


        // Variables
        private $content  = null;
        

        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof PersonEmailFactory )
            {
                return true;
            }

            return false;
        }


        // accessors
            // getters
        /**
         * @return mixed|string|null
         */
        final public function getContent()
        {
            if( is_null( $this->content ) )
            {
                return null;
            }

            return strval( $this->content );
        }


            // Setters
        /**
         * @param $var
         * @return mixed|void
         */
        final public function setContent( $var )
        {
            $this->content = $var;
        }

    }

?>