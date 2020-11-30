<?php

    /**
     * Class ImageModel
     */
    class ImageModel
        extends DatabaseModelEntity
    {
        /**
         * ImageModel constructor.
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
        private $image_src     = null;
        private $image_type_id = null;

        private $title = null;
        private $alt   = null;

        private $parent_id = null;

        private $registered   = null;
        private $last_updated = null;


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            $retval = false;

            if( $factory instanceof ImageFactory )
            {
                $retval = true;
            }

            return boolval( $retval );
        }

        
        // accessors
            // Getters
        /**
         * @return string|null
         */
        final public function getTitle()
        {
            if( is_null( $this->title ) )
            {
                return null;
            }

            return strval( $this->title );
        }


        /**
         * @return string|null
         */
        final public function getAlt()
        {
            if( is_null( $this->alt ) )
            {
                return null;
            }

            return strval( $this->alt );
        }


        /**
         * @return int|null
         */
        final public function getParentId()
        {
            if( is_null( $this->parent_id ) )
            {
                return null;
            }

            return intval( $this->parent_id, BASE_10 );
        }


        /**
         * @return string|null
         */
        final public function getImageSrc()
        {
            if( is_null( $this->image_src ) )
            {
                return null;
            }

            return strval( $this->image_src );
        }


        /**
         * @return int|null
         */
        final public function getImageTypeId()
        {
            if( is_null( $this->image_type_id ) )
            {
                return null;
            }

            return intval( $this->image_type_id, BASE_10 );
        }


        /**
         * @return |null
         */
        final public function getRegistered()
        {
            return $this->registered;
        }


        /**
         * @return |null
         */
        final public function getLastUpdated()
        {
            return $this->last_updated;
        }


            // Setters
        /**
         * @param $var
         * @throws Exception
         */
        final public function setTitle( $var )
        {
            if( !is_string( $var ) )
            {
                throw new Exception( 'ImageModel - setTitle: null or string is allowed' );
            }

            $this->title = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setAlt( $var )
        {
            if( !is_string( $var ) )
            {
                throw new Exception( 'ImageModel - setAlt: null or string is allowed' );
            }

            $this->alt = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setImageTypeId( $var )
        {
            if( !is_int( $var ) )
            {
                throw new Exception( 'ImageModel - setImageTypeId: null or numeric number is allowed' );
            }

            $this->image_type_id = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setImageSrc( $var )
        {
            if( !is_string( $var ) )
            {
                throw new Exception( 'ImageModel - setImageSrc: null or string is allowed' );
            }

            $this->image_src = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setParentId( $var )
        {
            if( !is_int( $var ) )
            {
                throw new Exception( 'ImageModel - setParentId: null or numeric number is allowed' );
            }

            $this->parent_id = $var;
        }


        /**
         * @param $var
         */
        final public function setRegistered( $var )
        {
            $this->registered = $var;
        }


        /**
         * @param $var
         */
        final public function setLastUpdated( $var )
        {
            $this->last_updated = $var;
        }

    }

?>