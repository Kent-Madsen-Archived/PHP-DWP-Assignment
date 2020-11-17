<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class Route
     */
    class Route
    {
        // Constructors
        /**
         * Route constructor.
         * @param $domain
         * @param $path_to_view
         */
        public function __construct( $domain, $path_to_view )
        {
            $this->setRouteDomain( $domain );
            $this->setPathToView( $path_to_view );
        }


        // Internal Variables
        private $route_domain = null;
        private $path_to_view = null;

        private $validation_tree = null;


        // Stages
        /**
         * @param $value
         * @return array|null
         * @throws Exception
         */
        public final function setValidationTree( $value ): ?array
        {
            if( !is_array( $value ) )
            {
                throw new Exception('parameter is not a array');
            }

            $this->validation_tree = $value;

            return $this->getValidationTree();
        }


        /**
         * @param $value
         * @throws Exception
         */
        public final function appendValidationObject( $value )
        {
            if( !$value instanceof RouterValidateArgument )
            {
                throw new Exception('');
            }

            $this->initiateValidationTree();

            array_push($this->validation_tree, $value );
        }


        /**
         * @param $values
         * @return array|null
         * @throws Exception
         */
        public final function appendValidationArray( $values ): ?array
        {
            if( !is_array( $values ) )
            {
                throw new Exception('Not an array');
            }

            foreach ( $values as $value )
            {
                $this->appendValidationObject( $value );
            }

            return $this->getValidationTree();
        }


        /**
         * @return array|null
         * @throws Exception
         */
        protected final function initiateValidationTree(): ?array
        {
            if( is_null( $this->getValidationTree() ) )
            {
                $this->setValidationTree( array() );
            }

            return $this->getValidationTree();
        }


        /**
         * @param $argument
         * @param $lvl
         * @return bool
         * @throws Exception
         */
        public function validate( $argument, $lvl ): bool
        {
            if( !is_int( $lvl ) )
            {
                throw new Exception('');
            }

            $retVal = false;

            if( is_null( $this->getValidationTree() ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            if( count( $this->getValidationTree() ) == CONSTANT_ZERO )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            for( $idx = CONSTANT_ZERO;
                 $idx < count( $this->getValidationTree() );
                 $idx ++ )
            {;
                $current = $this->getValidationTree()[ $idx ];
                $current_state = false;

                if( $current->getLevel() == $lvl )
                {
                    if( $current->validateArgumentLevel( $argument ) )
                    {
                        $current_state = true;
                    }
                }

                if( $current_state )
                {
                    $retVal = true;
                    break;
                }
            }

            return boolval( $retVal );
        }


        /**
         * @return array|null
         */
        final public function getValidationTree(): ?array
        {
            return $this->validation_tree;
        }


        /**
         * @return bool
         */
        final public function load(): bool
        {
            $retval = false;

            try
            {

                require_once $this->getPathToView();
                $retval = true;
            }
            catch( Exception $ex )
            {
                echo "Error: " . $ex;
            }

            return boolval( $retval );
        }


        // Accessors
        /**
         * @return Route|null
         */
        final public function getRouteDomain(): ?string
        {
            return strval( $this->route_domain );
        }


        /**
         * @return string|null
         */
        final public function getPathToView(): ?string
        {
            return strval( $this->path_to_view );
        }


        /**
         * @param $var
         * @return string|null
         */
        final public function setRouteDomain( $var ): ?string
        {
            $this->route_domain = strval( $var );
            return $this->getRouteDomain();
        }


        /**
         * @param $var
         * @return string|null
         */
        public function setPathToView( $var ): ?string
        {
            $this->path_to_view = strval( $var );
            return $this->getPathToView();
        }

    }

?>