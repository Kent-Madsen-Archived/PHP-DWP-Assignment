<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * Class Source
     */
    class Source 
    {
        /**
         * Source constructor.
         */
        public function __construct()
        {

        }

        // Variables
        private $type = null;
        
        private $name = null;
        private $version = null;

        private $uri = null;

        // Accessors

        /**
         * @return null
         */
        public function getType()
        {
            return $this->type;
        }

        /**
         * @return null
         */
        public function getName()
        {
            return $this->name;
        }

        /**
         * @return null
         */
        public function getVersion()
        {
            return $this->version;
        }

        /**
         * @return null
         */
        public function getUri()
        {
            return $this->uri;
        }

        /**
         * @param $var
         */
        public function setUri( $var )
        {
            $this->uri = $var;
        }

        /**
         * @param $var
         */
        public function setVersion( $var )
        {
            $this->version = $var;
        }

        /**
         * @param $var
         */
        public function setName( $var )
        {
            $this->name = $var;
        }

        /**
         * @param $var
         */
        public function setType( $var )
        {
            $this->type = $var;
        }



        
    }

?>