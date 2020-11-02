<?php

    /**
     * 
     */
    class Router
    {
        // Constructors
        /**
         * 
         */
        public function __construct()
        {
            $this->update();
        }

        /**
         * 
         */
        public function update()
        {
            $this->setCurrentRequest( $_SERVER['REQUEST_URI'] );
            $this->setCurrentRequestedHostname( $_SERVER['HTTP_HOST'] );   
        }

        // Variables
        private $current_request = null;
        private $current_requested_hostname = null;

            // Arguments
        private $args = null;

            // Hard Routes
        private $routes = null;

            // Special Routes
        private $special_page_404 = null;
        
        // Stages
        /**
         * 
         */
        public function load_view()
        {
            // Retrieves the current request
            $request_uri = $this->getCurrentRequest();

            // Request is a shortcut
            if( $this->is_shortcut() )
            {
                return;
            }

            // 
            $this->split_request_into_arguments();        

            //
            $this->route_domain( $this->getArgs()[1] );
        }

        /**
         * 
         */
        public function is_shortcut()
        {
            if( $this->getCurrentRequest() == '/' )
            {
                require 'views/index.php';
                return true;
            }

            return false;
        }

        /**
         * 
         */
        public function split_request_into_arguments()
        {
            $split_uri = explode( '/', $this->getCurrentRequest() );
            $this->setArgs( $split_uri );
        }

        /**
         * 
         */
        public function route_domain()
        {
            $idx = 0;

            //
            for( $idx = 0; 
                 $idx < $this->getLengthOfRoutes();
                 $idx ++ )
            {
                $current = $this->getRoutes()[$idx];

                if( $this->getArgs()[1] == $current->getRouteDomain() )
                {
                    $current->load();
                    return;
                }
            }

            //
            $page_404 = $this->getSpecialPage404();
            $page_404->load();
        }

        // Accessors
            // Getters
        /**
         * 
         */
        public function getCurrentRequest()
        {
            return $this->current_request;
        }

        /**
         * 
         */
        public function getCurrentRequestedHostname()
        {
            return $this->current_requested_hostname;
        }

        /**
         * 
         */
        public function getArgs()
        {
            return $this->args;
        }

        /**
         * 
         */
        public function getRoutes()
        {
            return $this->routes;
        }

        public function getLengthOfRoutes()
        {
            return sizeof( $this->routes );
        }

        /**
         * 
         */
        public function getSpecialPage404()
        {
            return $this->special_page_404;
        }

            // Setters
        /**
         * 
         */
        public function setCurrentRequest( $var )
        {
            $this->current_request = $var;
        }

        /**
         * 
         */
        public function setCurrentRequestedHostname( $var )
        {
            $this->current_requested_hostname = $var;
        }

        /**
         * 
         */
        public function setArgs( $var )
        {
            $this->args = $var;
        }

        /**
         * 
         */
        public function setRoutes( $var )
        {
            $this->routes = $var;
        }

        /**
         * 
         */
        public function setSpecialPage404( $var )
        {
            $this->special_page_404 = $var;
        }

        // States
        /**
         * 
         */
        public function isRoutesNull()
        {
            return $this->getRoutes() == null;
        }

        // Edit Accessors
        /**
         * 
         */
        public function appendRoutes( $var )
        {
            // if it's not present, create an array
            if( $this->isRoutesNull() )
            {
                $this->setRoutes( array() );
            }

            // push element
            array_push( $this->routes, $var );
        }
    }
?>