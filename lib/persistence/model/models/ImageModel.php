<?php

    /**
     * Class ImageModel
     */
    class ImageModel 
        extends DatabaseModel
            implements ImageController,
                       ImageView
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


        // implement interfaces
        /**
         * @return int|mixed|null
         */
        final public function viewIdentity()
        {
            if( $this->viewIsIdentityNull() )
            {
                return null;
            }

            return $this->getIdentity();
        }


        /**
         * @return bool|mixed
         */
        final public function viewIsIdentityNull()
        {
            $retVal = false;

            if( is_null( $this->identity ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return boolval( $retVal );
        }


        /**
         * @return mixed|void
         */
        public function viewTitle()
        {
            // TODO: Implement viewTitle() method.
            return null;
        }


        /**
         * @return mixed|null
         */
        final public function viewParent()
        {
            // TODO: Implement viewParent() method.
            return null;
        }


        /**
         * @return mixed|null
         */
        final public function viewImageType()
        {
            // TODO: Implement viewImageType() method.
            return null;
        }


        /**
         * @return mixed|null
         */
        final public function viewImageSrc()
        {
            // TODO: Implement viewImageSrc() method.
            return null;
        }


        /**
         * @return mixed|null
         */
        final public function viewAlt()
        {
            // TODO: Implement viewAlt() method.
            return null;
        }


        /**
         * @return mixed|null
         */
        final public function viewRegistered()
        {
            // TODO: Implement viewRegistered() method.
            return null;
        }


        /**
         * @return mixed|null
         */
        final public function viewLastUpdate()
        {
            // TODO: Implement viewLastUpdate() method.
            return null;
        }


        // Variables
        private $identity = null;

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
         * @return int|null
         */
        final public function getIdentity()
        {
            if( is_null( $this->identity ) )
            {
                return null;
            }

            return intval( $this->identity, self::base() );
        }


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

            return intval( $this->parent_id, self::base() );
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

            return intval( $this->image_type_id, self::base() );
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
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ImageModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setTitle( $var )
        {
            if( !$this->genericStringValidation( $var ) )
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
            if( !$this->genericStringValidation( $var ) )
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
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ImageModel - setImageTypeId: null or numeric number is allowed' );
            }

            $this->image_type_id = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setImageSrc( $var )
        {
            if( !$this->genericStringValidation( $var ) )
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
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ImageModel - setParentId: null or numeric number is allowed' );
            }

            $this->parent_id = $value;
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