<?php 

    class ImageModel 
        extends DatabaseModel
    {
        /**
         * 
         */
        function __construct( $factory )
        {
            $this->setFactory( $factory );   
        }

        private $identity = null;

        private $image_src     = null;
        private $image_type_id = null;

        private $title = null;
        private $alt   = null;

        private $parent_id = null;

        private $registered   = null;
        private $last_updated = null;

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

        public function setRegistered( $var )
        {
            $this->registered = $var;
        }

        public function setLastUpdated( $var )
        {
            $this->identity = $var;
        }


        public function setImageTypeId( $var )
        {
            $this->image_type_id = $var;
        }


        public function setImageSrc( $var )
        {
            $this->image_src = $var;
        }

        public function setParentId( $var )
        {
            $this->parent_id = $var;
        }

        public function setAlt( $var )
        {
            $this->alt = $var;
        }

        public function setTitle( $var )
        {
            $this->title = $var;
        }

        public function setIdentity( $var )
        {
            $this->identity = $var;
        }



    }

?>