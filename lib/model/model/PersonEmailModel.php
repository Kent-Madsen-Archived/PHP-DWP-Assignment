<?php 

    class PersonEmailModel 
        extends DatabaseModel
        implements PersonEmailController, PersonEmailView
    {
        function __construct( $factory )
        {
            $this->setFactory( $factory );
        }

        private $identity = 0;
        
        private $content = null;
        

        
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

    }

?>