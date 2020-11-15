<?php

/**
 * Class PageElementModel
 */
    class PageElementModel 
        extends DatabaseModel
        implements PageElementController,
                   PageElementView
    {
        // Constructors
        /**
         * PageElementModel constructor.
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

            if( is_null( $this->identity ) == true )
            {
                $retVal = true;
            }

            return $retVal;
        }

        /**
         * @return bool|mixed
         */
        final public function requiredFieldsValidated()
        {
            $retVal = false;

            return $retVal;
        }

        
        // Variables
        private $identity = null;
        private $area_key = null;
        
        private $title      = null;
        private $content    = null;

        private $created_on     = null;
        private $last_update    = null;


        // implementation of factory classes

        /**
         * @param $factory
         * @return bool|mixed
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof PageElementFactory )
            {
                return true;
            }

            return false;
        }

        // accessors
            // getters
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
        final public function getContent()
        {
            return $this->content;
        }


        /**
         * @return |null
         */
        final public function getAreaKey()
        {
            return $this->area_key;
        }


        /**
         * @return int|null
         */
        final public function getIdentity()
        {
            if( is_null( $this->identity ) )
            {
                return null;
            }

            return intval( $this->identity, self::base() );
        }

        /**
         * @return |null
         */
        final public function getCreatedOn()
        {
            return $this->created_on;
        }


        /**
         * @return |null
         */
        final public function getLastUpdate()
        {
            return $this->last_update;
        }

            // Setters

        /**
         * @param $var
         * @throws Exception
         */
        final public function setIdentity( $var )
        {
            $value = filter_var( $var, FILTER_VALIDATE_INT );

            if( !$this->identityValidation( $value ) )
            {
                throw new Exception( 'PageElementModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $value;
        }


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
        final public function setLastUpdate( $var )
        {
            $this->last_update = $var;
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setAreaKey( $var )
        {
            if( !$this->genericStringValidation( $var ) )
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
            if( !$this->genericStringValidation( $var ) )
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
            if( !$this->genericStringValidation( $var ) )
            {
                throw new Exception( 'PageElementModel - setTitle: null or string is allowed' );
            }
            
            $this->title = $var;
        }

    }

?>