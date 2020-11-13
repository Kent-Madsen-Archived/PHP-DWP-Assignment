<?php 

    class ImageTypeModel
        extends DatabaseModel
        implements ImageTypeController,
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
        private $content = null;

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
        public function getContent()
        {
            return $this->content;
        }

        /**
         * 
         */
        public function setIdentity( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'ImageTypeModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }


        /**
         * 
         */
        public function setContent( $var )
        {
            if( !$this->genericStringValidation( $var ) )
            {
                throw new Exception( 'ImageTypeModel - setContent: null or string is allowed' );
            }

            $this->content = $var;
        }
    }

?>