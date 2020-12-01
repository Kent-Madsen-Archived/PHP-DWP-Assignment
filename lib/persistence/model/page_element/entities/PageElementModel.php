<?php

/**
 * Class PageElementModel
 */
    class PageElementModel
        extends DatabaseModelEntity
    {
        // Constructors
        /**
         * PageElementModel constructor.
         * @param PageElementFactory|null $factory
         * @throws Exception
         */
        public function __construct( ?PageElementFactory $factory )
        {
            $this->setFactory( $factory );   
        }


        /**
         * @return bool
         */
        final public function requiredFieldsValidated(): bool
        {
            $areaKey_has_input = !is_null($this->area_key);
            $title_has_input = !is_null($this->title);
            $content_has_input = !is_null($this->content);

            $retVal = $areaKey_has_input && $title_has_input && $content_has_input;

            return boolval( $retVal );
        }

        
        // Variables
        private $area_key = null;
        
        private $title      = null;
        private $content    = null;

        private $created_on     = null;
        private $last_updated    = null;


        // implementation of factory classes
        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            $retval = false;

            if( $factory instanceof PageElementFactory )
            {
                $retval = true;
            }

            return boolval( $retval );
        }


        // accessors
            // getters
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
        final public function getContent()
        {
            if( is_null( $this->content ) )
            {
                return null;
            }

            return strval( $this->content );
        }


        /**
         * @return string|null
         */
        final public function getAreaKey()
        {
            if( is_null( $this->area_key ) )
            {
                return null;
            }

            return strval( $this->area_key );
        }


        /**
         * @return |null
         */
        final public function getCreatedOn()
        {
            if( is_null( $this->created_on ) )
            {
                return null;
            }

            return $this->created_on;
        }


        /**
         * @return |null
         */
        final public function getLastUpdated()
        {
            if( is_null( $this->last_updated ) )
            {
                return null;
            }

            return $this->last_updated;
        }


            // Setters
        /**
         * @param $var
         */
        final public function setCreatedOn( $var )
        {
            $this->created_on = $var;
        }


        /**
         * @param $var
         */
        final public function setLastUpdated( $var )
        {
            $this->last_updated = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setAreaKey( $var )
        {
            if( !is_string( $var ) )
            {
                throw new Exception( 'PageElementModel - setAreaKey: null or string is allowed' );
            }

            $this->area_key = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setContent( $var )
        {
            if( !is_string( $var ) )
            {
                throw new Exception( 'PageElementModel - setContent: null or string is allowed' );
            }

            $this->content = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setTitle( $var )
        {
            if( !is_string( $var ) )
            {
                throw new Exception( 'PageElementModel - setTitle: null or string is allowed' );
            }
            
            $this->title = $var;
        }

    }

?>