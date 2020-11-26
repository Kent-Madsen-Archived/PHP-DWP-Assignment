<?php

    /**
     * Class ProductUsedImageModel
     */
    class ProductUsedImageModelEntity
        extends DatabaseModelEntity
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


        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return boolval( $retVal );
        }
        

        // Variables
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
        final public function getImagePreviewId()
        {
            if( is_null( $this->image_preview_id ) )
            {
                return null;
            }

            return intval( $this->image_preview_id, BASE_10 );
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

            return intval( $this->image_full_id, BASE_10 );
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
            if( !is_int( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->image_preview_id = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setImageFullId( $var )
        {
            if( !is_int( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->image_full_id = $var;
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