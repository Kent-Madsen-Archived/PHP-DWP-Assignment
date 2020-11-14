<?php 

    class PageElementModel 
        extends DatabaseModel
        implements PageElementController,
                   PageElementView
    {
        // Constructors
        public function __construct( $factory )
        {
            $this->setFactory( $factory );   
        }

        // Variables
        private $identity = null;
        private $area_key = null;
        
        private $title      = null;
        private $content    = null;

        private $created_on     = null;
        private $last_update    = null;

        /**
         * 
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
         * 
         */
        final public function getTitle()
        {
            return $this->title;
        }


        /**
         * 
         */
        final public function getContent()
        {
            return $this->content;
        }


        /**
         * 
         */
        final public function getAreaKey()
        {
            return $this->area_key;
        }


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
        final public function getCreatedOn()
        {
            return $this->created_on;
        }

   
        /**
         * 
         */
        final public function getLastUpdate()
        {
            return $this->last_update;
        }

            // Setters
        /**
         * 
         */
        final public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'PageElementModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }

        /**
         * 
         */
        final public function setCreatedOn( $var )
        {
            $this->created_on = $var;
        }

        /**
         * 
         */
        final public function setLastUpdate( $var )
        {
            $this->last_update = $var;
        }

        /**
         * 
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
         * 
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
         * 
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