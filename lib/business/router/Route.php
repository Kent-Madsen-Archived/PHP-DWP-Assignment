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

        private $validation_tree = array();

        // Stages

        /**
         * @param $value
         * @throws Exception
         */
        public final function setValidationTree( $value )
        {
            if( !is_array( $value ) )
            {
                throw new Exception('parameter is not a array');
            }

            $this->validation_tree = $value;
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
            array_push($this->validation_tree, $value );
        }

        /**
         * @param $values
         * @throws Exception
         */
        public final function appendValidationArray( $values )
        {
            if( !is_array( $values ) )
            {
                throw new Exception('');
            }

            array_push($this->validation_tree, $values );
        }


        /**
         * @param $argument
         * @param $lvl
         * @return bool
         * @throws Exception
         */
        public function validate( $argument, $lvl )
        {
            if( !is_int( $lvl ) )
            {
                throw new Exception('');
            }

            $retVal = false;

            if( count( $this->getValidationTree() ) == 0 )
            {
                $retVal = true;
                return $retVal;
            }

            for( $idx = 0;
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

            return $retVal;
        }


        /**
         * @return array
         */
        final public function getValidationTree(  )
        {
            return $this->validation_tree;
        }


        /**
         *
         */
        final public function load()
        {
            require_once $this->getPathToView();
        }

        // Accessors
        /**
         * @return null
         */
        final public function getRouteDomain()
        {
            return $this->route_domain;
        }

        /**
         * @return null
         */
        final public function getPathToView()
        {
            return $this->path_to_view;
        }

        /**
         * @param $var
         */
        final public function setRouteDomain( $var )
        {
            $this->route_domain = $var;
        }

        /**
         * @param $var
         */
        public function setPathToView( $var )
        {
            $this->path_to_view = $var;
        }

    }

?>