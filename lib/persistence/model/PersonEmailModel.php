<?php

    /**
     * Class PersonEmailModel
     */
    class PersonEmailModel 
        extends DatabaseModel
            implements PersonEmailController, 
                       PersonEmailView
    {
        // Constructor
        /**
         * PersonEmailModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        
        // Variables
        private $identity = null;
        
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
         * @return mixed|null
         */
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return mixed|null
         */
        final public function getContent()
        {
            return $this->content;
        }


            // Setters
        /**
         * @param $var
         * @return mixed|void
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonEmailModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }


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