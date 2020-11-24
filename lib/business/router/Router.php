<?php
    /**
     *  Title: Router
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class Router
     */
    class Router
    {
        // Constructors
        /**
         * Router constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $this->update();
        }


        /**
         * @throws Exception
         */
        final public function update()
        {
            $this->setCurrentRequest( RouterState::getRequest() );
            $this->setCurrentRequestedHostname( RouterState::getHost() );
        }


        // Variables
        private $current_request = null;
        private $current_requested_hostname = null;

        private $args = null;

            // Hard Routes
        private $routes = null;

            // Special Routes
        private $special_page_404 = null;
        private $currentRoute = null;


        // Stages
        /**
         * @throws Exception
         */
        final public function loadView()
        {
            // Request is a shortcut
            if( $this->isShortcut() )
            {
                return;
            }

            // 
            $this->splitRequestIntoArguments();

            //
            $this->routeDomain( );
        }


        /**
         * @return bool
         */
        final public function isShortcut(): bool
        {
            $retVal = false;

            if( $this->getCurrentRequest() == '/' )
            {
                require 'views/index.php';
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         *
         */
        final public function splitRequestIntoArguments()
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
        final public function routeDomain()
        {
            $root_routing_level_idx = CONSTANT_ZERO;

            //
            for( $idx = CONSTANT_ZERO;
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
                    for( $idx = CONSTANT_ZERO;
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

                    $this->setCurrentRoute( $current );
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
         * @return string|null
         */
        final public function getCurrentRequest(): ?string
        {
            if ( is_null( $this->current_request ) )
            {
                return null;
            }

            return strval( $this->current_request );
        }


        /**
         * @return string|null
         */
        final public function getCurrentRequestedHostname(): ?string
        {
            if( is_null( $this->current_requested_hostname ) )
            {
                return null;
            }

            return strval( $this->current_requested_hostname );
        }


        /**
         * @return array|null
         */
        final public function getArgs(): ?array
        {
            if ( is_null( $this->args ) )
            {
                return null;
            }

            return $this->args;
        }



        /**
         * @param int $idx
         * @return string|null
         * @throws Exception
         */
        final public function getArg( $idx = CONSTANT_ZERO ): ?string
        {
            if( $idx < $this->getArgsSize() )
            {
                return strval( $this->getArgs()[ $idx ] );
            }
            else
            {
                RouterErrors::throwIsOutOfIndexBoundary();
            }
        }


        /**
         * @param int $idx
         * @param bool $selectClosesLvl
         * @return string|null
         * @throws Exception
         */
        final public function getArgLevel( $idx = CONSTANT_ZERO, $selectClosesLvl = true ): ?string
        {
            try
            {
                return $this->getArg( $idx );
            }
            catch ( Exception $ex )
            {
                if( $selectClosesLvl )
                {
                    return strval( $this->getArg( $this->getMaximumArguments() ) );
                }
                else
                {
                    return null;
                }
            }
        }


        /**
         * @return int|null
         */
        final public function getArgsSize(): ?int
        {
            if( is_null( $this->args ) )
            {
                return null;
            }

            return intval( count( $this->getArgs() ) );
        }


        /**
         * @return int|null
         */
        final public function getMaximumArguments(): ?int
        {
            if( is_null( $this->args ) )
            {
                return null;
            }

            if( count( $this->args ) == CONSTANT_ZERO )
            {
                return intval(CONSTANT_ZERO );
            }

            return intval( count( $this->getArgs() ) - CONSTANT_ONE );
        }


        /**
         * @return array|null
         */
        final public function getRoutes(): ?array
        {
            if( is_null( $this->routes ) )
            {
                return null;
            }

            return $this->routes;
        }

        /**
         * @return Route|null
         */
        public function getCurrentRoute(): ?Route
        {
            if( is_null( $this->currentRoute ) )
            {
                return null;
            }

            return $this->currentRoute;
        }


        /**
         * @return int|null
         */
        final public function getLengthOfRoutes(): ?int
        {
            if( is_null( $this->routes ) )
            {
                return null;
            }

            return intval( sizeof( $this->routes ) );
        }


        /**
         * @return Route|null
         */
        final public function getSpecialPage404(): ?Route
        {
            if( is_null( $this->special_page_404 ) )
            {
                return null;
            }

            return $this->special_page_404;
        }


            // Setters
        /**
         * @param $var
         * @return string|null
         * @throws Exception
         */
        final public function setCurrentRequest( $var ): ?string
        {
            if( is_null( $var ) )
            {
                $this->current_request = null;
                return $this->getCurrentRequest();
            }

            if( !is_string( $var ) )
            {
                RouterErrors::throwIsNotAnString();
            }

            $this->current_request = strval( $var );

            return $this->getCurrentRequest();
        }


        /**
         * @param $var
         * @return string|null
         * @throws Exception
         */
        final public function setCurrentRequestedHostname( $var ): ?string
        {
            if( is_null( $var ) )
            {
                $this->current_requested_hostname = null;
                return $this->getCurrentRequestedHostname();
            }

            if( !is_string( $var ) )
            {
                RouterErrors::throwIsNotAnString();
            }

            $this->current_requested_hostname = strval( $var );
            return $this->getCurrentRequestedHostname();
        }


        /**
         * @param $var
         * @return array|null
         * @throws Exception
         */
        final public function setArgs( $var ): ?array
        {
            if( is_null( $var ) )
            {
                $this->args = null;
                return $this->getArgs();
            }

            if( !is_array( $var ) )
            {
                RouterErrors::throwIsNotAnArray();
            }

            $this->args = $var;

            return $this->getArgs();
        }


        /**
         * @param $var
         * @return array|null
         * @throws Exception
         */
        final public function setRoutes( $var ): ?array
        {
            if( is_null( $var ) )
            {
                $this->routes = null;
                return $this->getRoutes();
            }

            if( !is_array( $var ) )
            {
                RouterErrors::throwIsNotAnArray();
            }

            $this->routes = $var;
            return $this->getRoutes();
        }


        /**
         * @param $currentRoute
         * @return Route|null
         */
        public function setCurrentRoute( $currentRoute ): ?Route
        {
            $this->currentRoute = $currentRoute;
            return $this->getCurrentRoute();
        }


        /**
         * @param $var
         * @return Route|null
         * @throws Exception
         */
        final public function setSpecialPage404( $var ): ?Route
        {
            if( is_null( $this->special_page_404 ) )
            {
                $this->special_page_404 = null;
                return $this->getSpecialPage404();
            }

            if(! ( $this->special_page_404 instanceof Route ) )
            {
                RouterErrors::throwIsNotInstanceOfRoute();
            }

            $this->special_page_404 = $var;
            return $this->getSpecialPage404();
        }


        // States
        /**
         * @return array|null
         * @throws Exception
         */
        final public function initiateRoutes(): ?array
        {
            if( is_null( $this->routes ) )
            {
                $this->setRoutes( array() );
            }

            return $this->getRoutes();
        }


        // Edit Accessors
        /**
         * @param $var
         * @return array|null
         * @throws Exception
         */
        final public function appendToRoutes( $var ): ?array
        {
            // if it's not present, create an array
            $this->initiateRoutes();

            if( !( $var instanceof Route ) )
            {
                RouterErrors::throwIsNotInstanceOfRoute();
            }

            // push element
            array_push( $this->routes, $var );

            return $this->getArgs();
        }


        /**
         * @param $var
         * @return array|null
         * @throws Exception
         */
        final public function appendToRoutesArray( $var ): ?array
        {
            if( is_null( $var ) )
            {
                return $this->getRoutes();
            }

            if(! is_array( $var ) )
            {
                RouterErrors::throwIsNotAnArray();
            }

            foreach ( $var as $value )
            {
                $this->appendToRoutes( $value );
            }

            return $this->getRoutes();
        }
    }
?>