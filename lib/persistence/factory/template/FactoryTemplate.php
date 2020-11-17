<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * Class FactoryTemplate
     */
    abstract class FactoryTemplate
        implements FactoryCRUD,
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
        final protected function validateAsValidConnector( $var ): bool
        {
            $retVal = false;

            if( is_null( $var ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            if( is_scalar( $var ) )
            {
                return boolval( $retVal );
            }

            if( $var instanceof MySQLConnectorWrapper )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @param $value
         * @return string
         * @throws Exception
         */
        final protected function escape( $value ) : string
        {
            $connector = $this->getWrapper()->getConnector();

            if( is_null( $connector ) )
            {
                throw new Exception('connector is null');
            }

            if( !( $connector instanceof mysqli ) )
            {
                throw new Exception('connector is not class mysqli');
            }

            return $connector->escape_string( $value );
        }


        /**
         * @param $Class
         * @param $interface_name
         * @return bool
         */
        final static public function ModelImplements( $Class, $interface_name ): bool
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
         * @return int
         * @throws Exception
         */
        final public function CalculateOffset(): int
        {
            if( is_null( $this->limit ) && is_null( $this->pagination_index ) )
            {
                throw new Exception( 'can\'t calculate offset, as either limit or pagination index is null' );
            }

            return intval( $this->getLimit() * $this->getPaginationIndex() );
        }


        /**
         * @return int|null
         * @throws Exception
         */
        final public function next(): ?int
        {
            $this->next_jump( CONSTANT_ONE );
            return $this->getPaginationIndex();
        }


        /**
         * @return int|null
         * @throws Exception
         */
        final public function previous(): ?int
        {
            $this->previous_jump( CONSTANT_ONE );
            return $this->getPaginationIndex();
        }


        /**
         * @param $value
         * @return int|null
         * @throws Exception
         */
        final public function next_jump( $value ): ?int
        {
            if( is_null( $value ) )
            {
                return null;
            }

            if( !is_numeric( $value ) )
            {
                throw new Exception('Parameter value is not a numeric.');
            }

            if( !is_int( $value ) )
            {
                throw new Exception('Variable is not null, or an Integer value.');
            }

            $this->setPaginationIndex( intval( $this->getPaginationIndex() + $value ) );

            return $this->getPaginationIndex();
        }


        /**
         * @param $value
         * @return int|null
         * @throws Exception
         */
        final public function previous_jump( $value ): ?int
        {
            if( is_null( $value ) )
            {
                return null;
            }

            if( !is_numeric( $value ) )
            {
                throw new Exception('Parameter value is not a numeric.');
            }

            if( !is_int( $value ) )
            {
                throw new Exception('Variable is not null, or an Integer value.' );
            }

            $this->setPaginationIndex( intval( $this->getPaginationIndex() - $value ) );

            return $this->getPaginationIndex();
        }


        // Template functions
        /**
         * @return mixed
         */
        public abstract function getFactoryTableName() : string;


        /**
         * @return mixed
         */
        public abstract function createModel();


        // Accessors
            // Getters
        /**
         * @return MySQLConnectorWrapper|null
         */
        final public function getWrapper(): ?MySQLConnectorWrapper
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
        final public function getPaginationIndex(): ?int
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
        final public function getLimit(): ?int
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
         * @return MySQLConnectorWrapper|null
         * @throws Exception
         */
        final public function setWrapper( $var ): ?MySQLConnectorWrapper
        {
            if( is_null( $var ) )
            {
                $this->connector = null;
                return $this->connector;
            }

            if( !$this->validateAsValidConnector( $var ) )
            {
                throw new Exception( "Factory - setConnector: Only the class MySQLConnectorWrapper or null is allowed" );
            }

            $this->connector = $var;

            return $this->connector;
        }


        /**
         * @param $idx
         * @return int|null
         * @throws Exception
         */
        final public function setPaginationIndex( $idx ): ?int
        {
            if( is_null( $idx ) )
            {
                $this->pagination_index = null;
                return $this->pagination_index;
            }

            if( !is_numeric( $idx ) )
            {
                throw new Exception('Parameter value is not a numeric.');
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
        final public function setLimit( $var ): ?int
        {
            if( is_null( $var ) )
            {
                $this->limit = null;
                return $this->limit;
            }

            if( !is_numeric( $var ) )
            {
                throw new Exception('Parameter value is not a numeric.');
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