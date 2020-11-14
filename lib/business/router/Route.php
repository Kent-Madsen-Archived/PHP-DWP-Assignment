<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

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

        private $validation_tree = array();

        // Stages
        /**
         * @param $value
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
         */
        public function validate( $argument, $lvl )
        {
            $retVal = false;

            if( count( $this->getValidationTree() ) == 0 )
            {
                $retVal = true;
                return $retVal;
            }

            for( $idx = 0;
                 $idx < count( $this->getValidationTree() );
                 $idx ++ )
            {
                $current = $this->getValidationTree()[ $idx ];

                if( $current->getLevel() == $lvl )
                {
                    if( $current->validateArgumentLevel( $argument ) )
                    {
                        $retVal = true;
                        break;
                    }
                }
            }

            return $retVal;
        }


        /**
         * @return array
         */
        public final function getValidationTree(  )
        {
            return $this->validation_tree;
        }



        /**
         * 
         */
        public function load()
        {
            require_once $this->getPathToView();
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