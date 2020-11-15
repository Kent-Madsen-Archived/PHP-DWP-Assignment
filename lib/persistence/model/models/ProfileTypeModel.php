<?php

    /**
     * Class ProfileTypeModel
     */
    class ProfileTypeModel 
        extends DatabaseModel
            implements ProfileTypeController, 
                       ProfileTypeView
    {
        // constructors
        /**
         * ProfileTypeModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );
        }


        // variables
        private $identity = 0;
        
        private $content = null;
        

        // implementation of factory classes

        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ProfileTypeFactory )
            {
                return true;
            }

            return false;
        }

        
        // accessors
            // getters
        /**
         * @return int
         */
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return |null
         */
        final public function getContent()
        {
            return $this->content;
        }
        

            // setters
        /**
         * @param $var
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );
            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ProfileTypeModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $value;
        }


        /**
         * @param $var
         */
        final public function setContent( $var )
        {
            $this->content = $var;
        }

    }
?>