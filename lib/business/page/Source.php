<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * 
     */
    class Source 
    {
        //
        public function __construct()
        {

        }

        // Variables
        private $type = null;
        
        private $name = null;
        private $version = null;

        private $uri = null;

        // Accessors
        public function getType()
        {
            return $this->type;
        }

        public function getName()
        {
            return $this->name;
        }

        public function getVersion()
        {
            return $this->version;
        }

        public function getUri()
        {
            return $this->uri;
        }

        public function setUri( $var )
        {
            $this->uri = $var;
        }

        public function setVersion( $var )
        {
            $this->version = $var;
        }

        public function setName( $var )
        {
            $this->name = $var;
        }

        public function setType( $var )
        {
            $this->type = $var;
        }



        
    }

?>