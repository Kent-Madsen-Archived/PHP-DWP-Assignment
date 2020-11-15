<?php

    /**
     * Class ProductUsedImageModel
     */
    class ProductUsedImageModel
        extends DatabaseModel
            implements ProductUsedImageController,
                       ProductUsedImageView
    {
        /**
         * ProductUsedImageModel constructor.
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
        

        // Variables
        private $identity = null;

        private $image_preview_id   = null;
        private $image_full_id      = null;

        private $is_profile_image = null;


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            $retval = false;

            if( $factory instanceof ProductUsedImageFactory )
            {
                $retval = true;
            }

            return boolval( $retval );
        }


        // Accessor
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

            return intval( $this->identity, self::base() );;
        }


        /**
         * @return int|null
         */
        final public function getImagePreviewId()
        {
            if( is_null( $this->image_preview_id ) )
            {
                return null;
            }

            return intval( $this->image_preview_id, self::base() );
        }


        /**
         * @return int|null
         */
        final public function getImageFullId()
        {
            if( is_null( $this->image_full_id ) )
            {
                return null;
            }

            return intval( $this->image_full_id, self::base() );
        }


        /**
         * @return |null
         */
        final public function getIsProfileImage()
        {
            return $this->is_profile_image;
        }


            // Setters

        /**
         * @param $var
         * @throws Exception
         */
        final public function setImagePreviewId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->image_preview_id = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setImageFullId( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->image_full_id = $value;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'ProductUsedImageModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $value;
        }


        /**
         * @param $var
         */
        final public function setIsProfileImage( $var )
        {
            $this->is_profile_image = $var;
        }
        

    }

?>