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
            if( $factory instanceof ImageFactory )
            {
                return true;
            }

            return false;
        }

        
        // accessors
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
        final public function getTitle()
        {
            return $this->title;
        }


        /**
         * @return |null
         */
        final public function getAlt()
        {
            return $this->alt;
        }


        /**
         * @return |null
         */
        final public function getParentId()
        {
            return $this->parent_id;
        }


        /**
         * @return |null
         */
        final public function getImageSrc()
        {
            return $this->image_src;
        }


        /**
         * @return |null
         */
        final public function getImageTypeId()
        {
            return $this->image_type_id;
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
            return $this->identity;
        }


            // Setters

        /**
         * @param $var
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ImageModel - setIdentity: null or numeric number is allowed' );
            }

            $this->identity = $var;
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
            if( !$this->genericNumberValidation( $var ) )
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
            if( !$this->genericNumberValidation( $var ) )
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
            $this->identity = $var;
        }



    }

?>