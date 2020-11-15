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
        

        // Variables
        private $identity = null;

        private $image_preview_id = null;
        private $image_full_id = null;

        private $is_profile_image = null;


        // implementation of factory classes

        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ProductUsedImageFactory )
            {
                return true;
            }

            return false;
        }


        // Accessor
            // Getters
        /**
         * @return |null
         */
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * @return |null
         */
        final public function getImagePreviewId()
        {
            return $this->image_preview_id;
        }


        /**
         * @return |null
         */
        final public function getImageFullId()
        {
            return $this->image_full_id;
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
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

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
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

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
            $value = filter_var( $var, FILTER_VALIDATE_INT  );

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