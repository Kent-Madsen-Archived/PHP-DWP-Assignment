<?php 

    class ImageTypeModel
        extends DatabaseModel
        implements ImageTypeController,
                   ImageView
    {
        /**
         * 
         */
        public function __construct( $factory )
        {
            $this->setFactory( $factory );   
        }
        
        // Variables
        private $identity = null;
        private $content = null;

        /**
         * 
         */
        final protected function validateFactory( $factory )
        {
            if( $factory instanceof ImageTypeFactory )
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
        final public function getIdentity()
        {
            return $this->identity;
        }


        /**
         * 
         */
        final public function getContent()
        {
            return $this->content;
        }

            // Setters
        /**
         * 
         */
        final public function setIdentity( $var )
        {
            if( !$this->identityValidation( $var ) )
            {
                throw new Exception( 'ImageTypeModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }


        /**
         * 
         */
        final public function setContent( $var )
        {
            if( !$this->genericStringValidation( $var ) )
            {
                throw new Exception( 'ImageTypeModel - setContent: null or string is allowed' );
            }

            $this->content = $var;
        }
    }

?>