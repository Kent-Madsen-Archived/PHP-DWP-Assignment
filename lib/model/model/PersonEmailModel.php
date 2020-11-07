<?php 

    class PersonEmailModel 
        implements PersonEmailController, PersonEmailView
    {
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        private $identity = 0;
        
        private $content = null;
        private $factory = null;

        /**
         * 
         */
        public function getFactory()
        {
            return $this->factory;
        }
        
        public function getIdentity()
        {
            return $this->identity;
        }

        public function setIdentity( $var )
        {
            $this->identity = $var;
        }

        public function getContent()
        {
            return $this->content;
        }
        
        public function setContent( $var )
        {
            $this->content = $var;
        }

        public function setFactory( $factory )
        {
            $this->factory = $factory;
        }
    
    }

?>