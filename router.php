<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class Router
     */
    class Router
    {
        // Constructors
        /**
         * Router constructor.
         */
        public function __construct()
        {
            $this->update();
        }

        /**
         *
         */
        final public function update()
        {
            $this->setCurrentRequest( $_SERVER[ 'REQUEST_URI' ] );
            $this->setCurrentRequestedHostname( $_SERVER[ 'HTTP_HOST' ] );   
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
        private $type = null;

        // Stages
        /**
         * @throws Exception
         */
        final public function load_view()
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
            $this->route_domain( );
        }

        /**
         * @return bool
         */
        final public function is_shortcut()
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
        final public function split_request_into_arguments()
        {
            // splits the url into an array, for each character / in the url
            $split_uri = explode( '/', $this->getCurrentRequest() );

            // moves removes the first object in the array[0]
            array_shift( $split_uri );

            // Removes empty spaces, when you enter a url, with ////. will leave a empty string for each.
            $values = array_filter( $split_uri );

            $this->setArgs( $values );
        }

        /**
         * @return mixed
         * @throws Exception
         */
        final public function route_domain()
        {
            $root_routing_level_idx = 0;

            //
            for( $idx = 0; 
                 $idx < $this->getLengthOfRoutes();
                 $idx ++ )
            {
                // Current Route
                $current = $this->getRoutes()[ $idx ];

                // first route selects a view and it's domain
                $root_domain = $this->getArgLevel( $root_routing_level_idx , false );

                //
                if( !is_null( $root_domain ) && ( $root_domain  == $current->getRouteDomain() ) )
                {
                    $retVal = false;

                    // Validates the url routes, if it get a false, ie. nothing is valid. it will return to Page 404;
                    // if it's validated, the view can fetch the route data.
                    for( $idx = 0;
                         $idx < $this->getArgsSize();
                         $idx ++ )
                    {
                        // current argument, depended on it's level
                        $value = $this->getArg( $idx );

                        // validate it and retrieve data
                        $retVal = $current->validate( $value, $idx );
                    }

                    // Error: Page 404
                    if( !$retVal )
                    {
                        break;
                    }

                    $current->load();
                    return $retVal;
                }
            }

            //
            $page_404 = $this->getSpecialPage404();
            $page_404->load();
        }

        // Accessors
            // Getters
        /**
         * @return null
         */
        final public function getCurrentRequest()
        {
            return $this->current_request;
        }

        /**
         * @return null
         */
        final public function getCurrentRequestedHostname()
        {
            return $this->current_requested_hostname;
        }

        /**
         * @return null
         */
        final public function getArgs()
        {
            return $this->args;
        }

        /**
         * @return null
         */
        final public function getType()
        {
            return $this->type;
        }

        /**
         * @param $idx
         * @return mixed
         * @throws Exception
         */
        final public function getArg( $idx )
        {
            if( $idx < $this->getArgsSize() )
            {
                return $this->getArgs()[ $idx ];
            }
            else
            {
                throw new Exception('$idx is outside of the arguments range');
            }
        }

        /**
         * @param $idx
         * @param $closesest_lvl
         * @return mixed|null
         * @throws Exception
         */
        final public function getArgLevel( $idx, $closesest_lvl )
        {
            try
            {
                return $this->getArg( $idx );
            }
            catch ( Exception $ex )
            {
                if( $closesest_lvl )
                {
                    return $this->getArg( $this->max_arguments() );
                }
                else
                {
                    return null;
                }
            }
        }

        /**
         * @return int
         */
        final public function getArgsSize()
        {
            return count( $this->getArgs() );
        }


        /**
         * @return int
         */
        final public function max_arguments()
        {
            return count( $this->getArgs() ) - 1;
        }


        /**
         * @return null
         */
        final public function getRoutes()
        {
            return $this->routes;
        }


        /**
         * @return int
         */
        final public function getLengthOfRoutes()
        {
            return sizeof( $this->routes );
        }


        /**
         * @return null
         */
        final public function getSpecialPage404()
        {
            return $this->special_page_404;
        }


            // Setters

        /**
         * @param $var
         */
        final public function setCurrentRequest( $var )
        {
            $this->current_request = $var;
        }

        /**
         * @param $var
         */
        final public function setCurrentRequestedHostname( $var )
        {
            $this->current_requested_hostname = $var;
        }

        /**
         * @param $var
         */
        final public function setArgs( $var )
        {
            $this->args = $var;
        }


        /**
         * @param $var
         */
        final public function setRoutes( $var )
        {
            $this->routes = $var;
        }


        /**
         * @param $var
         */
        final public function setType( $var )
        {
            $this->type = $var;
        }


        /**
         * @param $var
         */
        final public function setSpecialPage404( $var )
        {
            $this->special_page_404 = $var;
        }

        // States

        /**
         * @return bool
         */
        final public function isRoutesNull()
        {
            return is_null( $this->getRoutes() );
        }

        // Edit Accessors

        /**
         * @param $var
         */
        final public function appendRoutes( $var )
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