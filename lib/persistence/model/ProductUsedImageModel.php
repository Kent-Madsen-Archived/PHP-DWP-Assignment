<?php 

    class ProductUsedImageModel
        extends DatabaseModel
        implements ProductUsedImageController,
                   ProductUsedImageView
    {
        /**
         * 
         */
        function __construct( $factory )
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
        protected function validateFactory( $factory )
        {
            if( $factory instanceof ProductUsedImageFactory )
            {
                return true;
            }

            return false;
        }

        // Accessor
        public function getIdentity()
        {
            return $this->identity;
        }

        public function getImagePreviewId()
        {
            return $this->image_preview_id;
        }

        
        public function getImageFullId()
        {
            return $this->image_full_id;
        }
        
        
        public function getIsProfileImage()
        {
            return $this->is_profile_image;
        }
        
        public function setImagePreviewId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->image_preview_id = $var;
        }

        public function setImageFullId( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PersonAddressModel - setStreetAddressNumber: null or numeric number is allowed' );
            }

            $this->image_full_id = $var;
        }
        
        public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ProductUsedImageModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }

        public function setIsProfileImage( $var )
        {
            $this->is_profile_image = $var;
        }
        

    }

?>