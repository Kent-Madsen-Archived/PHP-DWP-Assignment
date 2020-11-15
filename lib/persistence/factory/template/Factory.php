<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * Class Factory
     */
    abstract class Factory
        implements CRUD, 
                   SetupFactory, 
                   StateFactory
    {
        //
        private $connector = null;
        
        // Useful when implementing pagination
        private $pagination_index = 0;
        private $limit = 5;


        // Validation of objects

        /**
         * @param $var
         * @return bool
         */
        final protected function validateAsValidConnector( $var )
        {
            if( is_null( $var ) )
            {
                return true;
            }

            if( $var instanceof MySQLConnector )
            {
                return true;
            }

            return false;
        }


        /**
         * @param $Class
         * @param $interface_name
         * @return bool
         */
        final static public function modelImplements( $Class, $interface_name )
        {
            $retVal = false;

            $class_interfaces_implemented = class_implements( $Class );

            foreach ( $class_interfaces_implemented as $interface_implemented_value )
            {
                if( strtolower( $interface_name ) == strtolower( $interface_implemented_value ) )
                {
                    $retVal = true;
                    break;
                }
            }

            return boolval( $retVal );
        }


        // Cursor
        /**
         * @return float|int
         */
        final public function calculateOffset()
        {
            return $this->getLimit() * $this->getPaginationIndex();
        }


        /**
         * @return int
         */
        final public function next()
        {
            $this->next_jump( 1 );

            return $this->getPaginationIndex();
        }


        /**
         * @param $value
         * @return int
         * @throws Exception
         */
        final public function next_jump( $value )
        {
            $this->setPaginationIndex( ( $this->getPaginationIndex() + $value ) );

            return $this->getPaginationIndex();
        }


        /**
         * @return int
         */
        final public function previous()
        {
            $this->previous_jump( 1 );
            return $this->getPaginationIndex();
        }


        /**
         * @param $value
         * @return int
         * @throws Exception
         */
        final public function previous_jump( $value )
        {
            $this->setPaginationIndex( ( $this->getPaginationIndex() - $value ) );
            return $this->getPaginationIndex();
        }


        // Template functions

        /**
         * @return mixed
         */
        public abstract function getFactoryTableName();


        /**
         * @return mixed
         */
        public abstract function createModel();


        // Accessors
            // Getters
        /**
         * @return |null
         */
        final public function getConnector()
        {
            return $this->connector;
        }


        /**
         * @return int
         */
        final public function getPaginationIndex()
        {
            return $this->pagination_index;
        }


        /**
         * @return int
         */
        final public function getLimit()
        {
            return $this->limit;
        }


            // Setters

        /**
         * @param $var
         * @throws Exception
         */
        final public function setConnector( $var )
        {
            if( !$this->validateAsValidConnector( $var ) )
            {
                throw new Exception( "Factory - setConnector: Only class MySQLConnector or null is allowed" );
            }

            $this->connector = $var;
        }


        /**
         * @param $idx
         * @throws Exception
         */
        final public function setPaginationIndex( $idx )
        {
            if( $idx == null || ( is_numeric( $idx ) && is_integer( $idx ) )  )
            {
                $this->pagination_index = $idx;
            }
            else
            {
                throw new Exception( 'Factory - setPaginationIndex: only numeric characters or null is allowed' );
            }
        }


        /**
         * @param $var
         * @throws Exception
         */
        final public function setLimit( $var )
        {
            if( is_null( $var ) || ( is_numeric( $var ) && is_integer( $var ) ) )
            {
                $this->limit = $var;
            }
            else 
            {
                throw new Exception( 'Factory - setLimit: only numeric characters or null is allowed' );   
            }
        }

    }

?>