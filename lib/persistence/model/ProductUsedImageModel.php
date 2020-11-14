<?php 

    class ProductUsedImageModel
        extends DatabaseModel
        implements ProductUsedImageController,
                   ProductUsedImageView
    {
        /**
         * 
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

        /**
         * 
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
        * 
        */
        final public function getIdentity()
        {
            return $this->identity;
        }

        /**
         * 
         */
        final public function getImagePreviewId()
        {
            return $this->image_preview_id;
        }

        /**
         * 
         */
        final public function getImageFullId()
        {
            return $this->image_full_id;
        }
        
        /**
         * 
         */
        final public function getIsProfileImage()
        {
            return $this->is_profile_image;
        }

            // Setters
        /**
         * 
         */
        final public function setImagePreviewId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->image_preview_id = $var;
        }

        /**
         * 
         */
        final public function setImageFullId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->image_full_id = $var;
        }
        
        /**
         * 
         */
        final public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ProductUsedImageModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }

        /**
         * 
         */
        final public function setIsProfileImage( $var )
        {
            $this->is_profile_image = $var;
        }
        

    }

?>