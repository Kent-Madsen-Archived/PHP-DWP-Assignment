<?php 

    class ImageModel 
        extends DatabaseModel
        implements ImageController,
                   ImageView
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

        private $image_src     = null;
        private $image_type_id = null;

        private $title = null;
        private $alt   = null;

        private $parent_id = null;

        private $registered   = null;
        private $last_updated = null;

        /**
         * 
         */
        protected function validateFactory( $factory )
        {
            if( $factory instanceof ImageFactory )
            {
                return true;
            }

            return false;
        }

        //
        public function getIdentity()
        {
            return $this->identity;
        }

        public function getTitle()
        {
            return $this->title;
        }

        public function getAlt()
        {
            return $this->alt;
        }

        public function getParentId()
        {
            return $this->parent_id;
        }

        public function getImageSrc()
        {
            return $this->image_src;
        }

        public function getImageTypeId()
        {
            return $this->image_type_id;
        }

        public function getRegistered()
        {
            return $this->registered;
        }

        public function getLastUpdated()
        {
            return $this->identity;
        }

        public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ImageModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $var;
        }

        public function setTitle( $var )
        {
            if( !$this->genericStringValidation( $var ) )
            {
                throw new Exception( 'ImageModel - setTitle: null or string is allowed' );
            }

            $this->title = $var;
        }

        
        public function setAlt( $var )
        {
            if( !$this->genericStringValidation( $var ) )
            {
                throw new Exception( 'ImageModel - setAlt: null or string is allowed' );
            }

            $this->alt = $var;
        }


        public function setImageTypeId( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'ImageModel - setImageTypeId: null or numeric number is allowed' );
            }

            $this->image_type_id = $var;
        }


        public function setImageSrc( $var )
        {
            if( !$this->genericStringValidation( $var ) )
            {
                throw new Exception( 'ImageModel - setImageSrc: null or string is allowed' );
            }

            $this->image_src = $var;
        }

        public function setParentId( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'ImageModel - setParentId: null or numeric number is allowed' );
            }

            $this->parent_id = $var;
        }

        public function setRegistered( $var )
        {
            $this->registered = $var;
        }


        public function setLastUpdated( $var )
        {
            $this->identity = $var;
        }



    }

?>