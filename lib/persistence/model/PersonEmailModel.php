<?php 

    /**
     * 
     */
    class PersonEmailModel 
        extends DatabaseModel
            implements PersonEmailController, 
                       PersonEmailView
    {
        // Constructor
        /**
         * 
         */
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        // Variables
        private $identity = null;
        
        private $content  = null;
        

        // accessors
            // getters
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

            // Setters
        /**
         * 
         */
        public function setIdentity( $var )
        {
            if( !$this->genericNumberValidation( $var ) )
            {
                throw new Exception( 'PersonEmailModel - setIdentity: null or numeric number is allowed' );
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

    }

?>