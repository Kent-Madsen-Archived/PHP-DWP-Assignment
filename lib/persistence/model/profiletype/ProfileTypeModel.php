<?php

    /**
     * Class ProfileTypeModel
     */
    class ProfileTypeModel
        extends DatabaseModelEntity
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


        /**
         * @return bool
         */
        final public function requiredFieldsValidated(): bool
        {
            $retVal = false;

            if( !$this->isContentNull() )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        // variables
        private $content  = null;
        

        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            $retval = false;

            if( $factory instanceof ProfileTypeFactory )
            {
                $retval = true;
            }

            return boolval( $retval );
        }


        /**
         * @return bool
         */
        final protected function isContentNull(): bool
        {
            return boolval( is_null( $this->content ) );
        }

        
        // accessors
            // getters
        /**
         * @return string|null
         */
        final public function getContent(): ?string
        {
            if( $this->isContentNull() )
            {
                return null;
            }

            return strval( $this->content );
        }
        

            // setters
        /**
         * @param $var
         * @return string|null
         * @throws Exception
         */
        final public function setContent( $var ): ?string
        {
            if( is_null( $var ) )
            {
                $this->content = null;
                return $this->content;
            }

            if( !is_string( $var ) )
            {
                throw new Exception('');
            }

            $this->content = strval( $var );
            return $this->content;
        }

    }
?>