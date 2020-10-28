<?php

    /**
     * 
     */
    class Route
    {
        // Constructors
        /**
         * 
         */
        public function __construct( $domain, $path_to_view )
        {
            $this->setRouteDomain( $domain );
            $this->setPathToView( $path_to_view );
        }

        // Internal Variables
        private $route_domain = null;
        private $path_to_view = null;


        // Stages
        /**
         * 
         */
        public function load()
        {
            require $this->getPathToView();
        }

        // Accessors
        /**
         * 
         */
        public function getRouteDomain()
        {
            return $this->route_domain;
        }

        /**
         * 
         */
        public function getPathToView()
        {
            return $this->path_to_view;
        }

        /**
         * 
         */
        public function setRouteDomain( $var )
        {
            $this->route_domain = $var;
        }

        /**
         * 
         */
        public function setPathToView( $var )
        {
            $this->path_to_view = $var;
        }


    }

?>