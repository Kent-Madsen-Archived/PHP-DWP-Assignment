<?php 

    class ProductAttributeModel 
        extends DatabaseModel
        implements ProductAttributeController,
                   ProductAttributeView
    {
        // Constructors
        function __construct( $factory )
        {
            $this->setFactory( $factory );   
        }

        // Variables
        private $identity = null;
        private $content  = null;

        // accessors
        /**
         * 
         */
        public function setIdentity( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'ProductAttributeModel - setIdentity: null or numeric number is allowed' );
            }
            
            $this->identity = $var;
        }
        

        /**
         * 
         */
        public function setContent( $var )
        {
            $this->content = $var;
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
        public function getContent()
        {
            return $this->content;
        }

    }

?>