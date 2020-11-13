<?php 

    class ProductUsedImageModel
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
            $this->image_preview_id = $var;
        }

        public function setImageFullId( $var )
        {
            $this->image_full_id = $var;
        }
        
        public function setIdentity( $var )
        {
            $this->identity = $var;
        }

        public function setIsProfileImage( $var )
        {
            $this->is_profile_image = $var;
        }
        

    }

?>