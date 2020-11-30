<?php

    /**
     * Class ImageTypeModel
     */
    class ImageTypeModel
        extends DatabaseModelEntity
    {
        /**
         * ImageTypeModel constructor.
         * @param $factory
         * @throws Exception
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );   
        }


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return boolval( $retVal );
        }
        
        
        // Variables
        private $content    = null;


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            $retval = false;

            if( $factory instanceof ImageTypeFactory )
            {
                $retval = true;
            }

            return boolval( $retval );
        }


        // accessors
            // getters
        /**
         * @return string|null
         */
        final public function getContent(): ?string
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
         * @return string|null
         * @throws Exception
         */
        final public function setContent( $var ): ?string
        {
            if( is_null( $var ) )
            {
                $this->content = null;
                return $this->getContent();
            }

            if( !is_string( $var ) )
            {
                throw new Exception( 'ImageTypeModel - setContent: null or string is allowed' );
            }

            $this->content = strval( $var );
            return $this->getContent();
        }

    }

?>