<?php 

    /**
     * 
     */
    class PersonEmailModel 
        extends DatabaseModel
            implements PersonEmailController, 
                       PersonEmailView
    {
        /**
         * 
         */
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        // Variables
        private $identity = 0;
        
        private $content = null;
        

        // accessors
            // getters
        public function getIdentity()
        {
            return $this->identity;
        }

        public function getContent()
        {
            return $this->content;
        }

            // Setters
        public function setIdentity( $var )
        {
            $this->identity = $var;
        }
        
        public function setContent( $var )
        {
            $this->content = $var;
        }

    }

?>