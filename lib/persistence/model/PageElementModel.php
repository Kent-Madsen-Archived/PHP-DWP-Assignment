<?php 

    class PageElementModel 
        extends DatabaseModel
        implements PageElementController,
                   PageElementView
    {
        // Constructors
        function __construct( $factory )
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

        // accessors
        /**
         * 
         */
        public function getTitle()
        {
            return $this->title;
        }


        /**
         * 
         */
        public function getContent()
        {
            return $this->content;
        }


        /**
         * 
         */
        public function getAreaKey()
        {
            return $this->area_key;
        }


        /**
         * 
         */
        public function getIdentity()
        {
            return $this->identity;
        }

        /**
         * 
         */
        public function getCreatedOn()
        {
            return $this->created_on;
        }

   
        /**
         * 
         */
        public function getLastUpdate()
        {
            return $this->last_update;
        }


        /**
         * 
         */
        public function setIdentity( $var )
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
        public function setCreatedOn( $var )
        {
            $this->created_on = $var;
        }

        /**
         * 
         */
        public function setLastUpdate( $var )
        {
            $this->last_update = $var;
        }


        /**
         * 
         */
        public function setAreaKey( $var )
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
        public function setContent( $var )
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
        public function setTitle( $var )
        {
            if( !$this->genericStringValidation( $var ) )
            {
                throw new Exception( 'PageElementModel - setTitle: null or string is allowed' );
            }
            
            $this->title = $var;
        }




    }

?>