<?php 
    /**
     *  Title: FactoryTemplate
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Abstract Class
     *  Project: DWP-Assignment
     */


    /**
     * Class FactoryTemplate
     */
    abstract class BaseFactoryTemplate
        implements FactoryCRUDInterface,
                   FactoryStateInterface
    {
        /**
         *
         */
        protected final function setupBase()
        {
            $this->pagination_index_counter = new CounterObject();
            $this->limit_counter            = new CounterObject();
        }

        //
        private $connector = null;
        

        // Useful when implementing pagination
        private $pagination_index_counter = null;
        private $limit_counter = null;


        //
        /**
         * @param int $limit
         * @param int $pagination_index
         */
        protected final function setPaginationAndLimit( int $limit = 5, int $pagination_index = 0 ): void
        {
            $this->setLimitValue( $limit );
            $this->setPaginationIndexValue( $pagination_index );
        }


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
         * @param mysqli $value
         * @return string
         */
        final protected function escape( mysqli $value ): string
        {
            $connector = $this->getWrapper()->getConnector();

            return $connector->escape_string( $value );
        }


        /**
         * @param int $value
         * @return int
         */
        final public static function Int10( int $value ): int
        {
            return intval($value, 10);
        }


        /**
         * @return int
         * @throws Exception
         */
        final public function CalculateOffset(): int
        {
            if( $this->getLimitCounter()->isCurrentNull() && $this->getPaginationIndexCounter()->isCurrentNull() )
            {
                throw new Exception( 'can\'t calculate offset, as either limit or pagination index is null' );
            }

            return self::Int10( ( $this->getLimitValue() * $this->getPaginationIndexValue() ));
        }


        /**
         * @return int|null
         * @throws Exception
         */
        final public function next(): ?int
        {
            return $this->getPaginationIndexCounter()->increment();
        }


        /**
         * @return int|null
         * @throws Exception
         */
        final public function previous(): ?int
        {
            return $this->getPaginationIndexCounter()->decrement();
        }


        /**
         * @param $value
         * @return int|null
         * @throws Exception
         */
        final public function nextJump( ?int $value=0 ): ?int
        {
            if( is_null( $value ) )
            {
                return null;
            }

            if( $value == 0 )
            {
                return $this->getPaginationIndexValue();
            }

            $this->getPaginationIndexCounter()->increase( $value );

            return $this->getPaginationIndexValue();
        }


        /**
         * @param $value
         * @return int|null
         * @throws Exception
         */
        final public function previousJump( ?int $value=0 ): ?int
        {
            if( is_null( $value ) )
            {
                return null;
            }

            if( $value == 0 )
            {
                return $this->getPaginationIndexValue();
            }

            $this->getPaginationIndexCounter()->decrease( $value );

            return $this->getPaginationIndexValue();
        }


        // Template functions
        /**
         * @return mixed
         */
        public abstract function getFactoryTableName(): string;


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
        final public function getPaginationIndexValue(): ?int
        {
            if( is_null( $this->getPaginationIndexCounter()->isCurrentNull() ) )
            {
                return null;
            }

            return $this->getPaginationIndexCounter()->getCurrent();
        }


        /**
         * @return int|null
         */
        final public function getLimitValue(): ?int
        {
            if( is_null( $this->getLimitCounter()->isCurrentNull() ) )
            {
                return null;
            }

            return $this->getLimitCounter()->getCurrent();
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
         * @param int|null $idx
         * @return int|null
         */
        final public function setPaginationIndexValue( ?int $idx ): ?int
        {
            $this->getPaginationIndexCounter()->setCurrent( $idx );
            return $this->getPaginationIndexValue();
        }


        /**
         * @param int|null $var
         * @return int|null
         */
        final public function setLimitValue( ?int $var ): ?int
        {
            $counter = $this->getLimitCounter();
            $counter->setCurrent( $var );

            return intval( $this->getLimitValue() );
        }


        /**
         * @return bool
         */
        final public function isPaginationIndexAtMinimumBoundary(): bool
        {
            $counter = $this->getPaginationIndexCounter();

            if( is_null( $counter->getCurrent() ) )
            {
                return boolval( false );
            }

            return self::isEqualsToOrBelow( $counter->getCurrent(), CONSTANT_ZERO );
        }


        /**
         * @return bool
         * @throws Exception
         */
        final public function isPaginationIndexAtMaximumBoundary(): bool
        {
            $pagination_counter = $this->getPaginationIndexCounter();
            $limit_counter = $this->getLimitCounter();

            if( $limit_counter->isCurrentNull() || ( $pagination_counter->isCurrentNull() ) )
            {
                throw new Exception('No boundary');
            }

            $size = floatval( floatval( $this->length() ) / floatval( $limit_counter->getCurrent() ) );

            // round down.
            $r_size = self::Int10( floor( floatval( $size ) ) );

            // Return true, if index is above or equals to rSize
            return self::isEqualToOrAbove( $pagination_counter->getCurrent(), $r_size );
        }


        /**
         * @param int $position
         * @param int $boundary
         * @return bool
         */
        public final static function isEqualsToOrBelow( int $position=0, int $boundary=0 ): bool
        {
            $equals = ($position == $boundary);
            $below = ($boundary > $position);

            return ($equals || $below);
        }

        /**
         * @param int $position
         * @param int $boundary
         * @return bool
         */
        public final static function isEqualToOrAbove( int $position=0, int $boundary=0 ): bool
        {
            $equals = ($position == $boundary);
            $isAbove = ($position > $boundary);

            return ( $equals || $isAbove );
        }


        /**
         * @return CounterObject|null
         */
        public final function getPaginationIndexCounter(): ?CounterObject
        {
            return $this->pagination_index_counter;
        }


        /**
         * @param CounterObject|null $pagination_index_counter
         */
        public final function setPaginationIndexCounter( ?CounterObject $pagination_index_counter): void
        {
            $this->pagination_index_counter = $pagination_index_counter;
        }


        /**
         * @param CounterObject|null $limit_counter
         */
        public final function setLimitCounter( ?CounterObject $limit_counter ): void
        {
            $this->limit_counter = $limit_counter;
        }


        /**
         * @return CounterObject|null
         */
        public final function getLimitCounter(): ?CounterObject
        {
            return $this->limit_counter;
        }


        /**
         *
         */
        public final function dumpCounterStatus()
        {
            $pag = print_r( $this->getPaginationIndexCounter(), true );
            $limit = print_r($this->getLimitCounter(), true);

            echo htmlentities("Pagination Counter : {$pag}"). '</br>' .
                 htmlentities("Limit Counter : {$limit}");
        }

    }

?>