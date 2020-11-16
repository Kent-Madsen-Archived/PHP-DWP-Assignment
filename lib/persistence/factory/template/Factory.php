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
        implements FactoryCRUD,
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
            $retVal = false;

            if( is_null( $var ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            if( $var instanceof MySQLConnector )
            {
                $retVal = true;
            }

            return boolval( $retVal );
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
         * Calculates, the offset, used by MYSQL
         * @return int
         * @throws Exception
         */
        final public function calculateOffset()
        {
            if( !( is_null( $this->limit ) && is_null( $this->pagination_index ) ) )
            {
                throw new Exception( 'can\'t calculate offset, as either limit or pagination index is null' );
            }

            return intval($this->getLimit() * $this->getPaginationIndex() );
        }


        /**
         * @return int|null
         * @throws Exception
         */
        final public function next()
        {
            $this->next_jump( CONSTANT_ONE );

            return $this->getPaginationIndex();
        }


        /**
         * @param $value
         * @return int|null
         * @throws Exception
         */
        final public function next_jump( $value )
        {
            if( is_null( $value ) )
            {
                return $this->getPaginationIndex();
            }

            if( !is_int( $value ) )
            {
                throw new Exception('Variable is not null, or an Integer value.');
            }

            $this->setPaginationIndex( intval( $this->getPaginationIndex() + $value ) );
            return $this->getPaginationIndex();
        }


        /**
         * @return int|null
         * @throws Exception
         */
        final public function previous()
        {
            $this->previous_jump( CONSTANT_ONE );

            return $this->getPaginationIndex();
        }


        /**
         * @param $value
         * @return int|null
         * @throws Exception
         */
        final public function previous_jump( $value )
        {
            if( is_null( $value ) )
            {
                return $this->getPaginationIndex();
            }

            if( !is_int( $value ) )
            {
                throw new Exception('Variable is not null, or an Integer value.');
            }

            $this->setPaginationIndex( intval( $this->getPaginationIndex() - $value ) );
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
            if( is_null( $this->connector ) )
            {
                return null;
            }

            return $this->connector;
        }


        /**
         * @return int|null
         */
        final public function getPaginationIndex()
        {
            if( is_null( $this->pagination_index ) )
            {
                return null;
            }

            return intval( $this->pagination_index );
        }


        /**
         * @return int|null
         */
        final public function getLimit()
        {
            if( is_null( $this->limit ) )
            {
                return null;
            }

            return intval( $this->limit );
        }


            // Setters
        /**
         * @param $var
         * @return |null
         * @throws Exception
         */
        final public function setConnector( $var )
        {
            if( is_null( $var ) )
            {
                $this->connector = null;
                return $this->connector;
            }

            if( !$this->validateAsValidConnector( $var ) )
            {
                throw new Exception( "Factory - setConnector: Only the class MySQLConnector or null is allowed" );
            }

            $this->connector = $var;

            return $this->connector;
        }


        /**
         * @param $idx
         * @return int|null
         * @throws Exception
         */
        final public function setPaginationIndex( $idx )
        {
            if( is_null( $idx ) )
            {
                $this->pagination_index = null;
                return $this->pagination_index;
            }

            if( ( is_numeric( $idx ) && is_integer( $idx ) )  )
            {
                $this->pagination_index = intval( $idx );
            }
            else
            {
                throw new Exception( 'Factory - setPaginationIndex: only numeric characters or null is allowed' );
            }

            return intval( $this->pagination_index );
        }


        /**
         * @param $var
         * @return int|null
         * @throws Exception
         */
        final public function setLimit( $var )
        {
            if( is_null( $var ) )
            {
                $this->limit = null;
                return $this->limit;
            }

            if( ( is_numeric( $var ) && is_integer( $var ) ) )
            {
                $this->limit = intval( $var );
            }
            else 
            {
                throw new Exception( 'Factory - setLimit: only numeric characters or null is allowed' );   
            }

            return intval( $this->limit );
        }

    }

?>