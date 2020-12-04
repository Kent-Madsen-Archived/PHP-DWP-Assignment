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


        /**
         * @return string
         */
        public abstract function appendices(): string;


        /**
         * @param array $filters
         * @return bool
         */
        public abstract function insertOptions( array $filters ): bool;



        // Validation of objects
        /**
         * @param $var
         * @return bool
         */
        protected final function validateAsValidConnector( $var ): bool
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
        protected final function escape( mysqli $value ): string
        {
            $connector = $this->getWrapper()->getConnector();

            return $connector->escape_string( $value );
        }


        /**
         * @return int
         * @throws Exception
         */
        public final function CalculateOffset(): int
        {
            if( $this->getLimitCounter()->isCurrentNull() && $this->getPaginationIndexCounter()->isCurrentNull() )
            {
                throw new Exception( 'can\'t calculate offset, as either limit or pagination index is null' );
            }

            return ( $this->getLimitValue() * $this->getPaginationIndexValue() );
        }


        /**
         *
         */
        public final function next(): void
        {
            $this->getPaginationIndexCounter()->increment();
        }


        /**
         *
         */
        public final function previous(): void
        {
            $this->getPaginationIndexCounter()->decrement();
        }


        /**
         * @param $value
         * @return int|null
         * @throws Exception
         */
        public final function nextJump( ?int $value=0 ): ?int
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
        public final function previousJump( ?int $value=0 ): ?int
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
        public final function getLimitValue(): ?int
        {
            if( is_null( $this->getLimitCounter()->isCurrentNull() ) )
            {
                return null;
            }

            return $this->getLimitCounter()->getCurrent();
        }


        /**
         * @return CounterObject|null
         */
        public final function getPaginationIndexCounter(): ?CounterObject
        {
            return $this->pagination_index_counter;
        }


        /**
         * @return CounterObject|null
         */
        public final function getLimitCounter(): ?CounterObject
        {
            return $this->limit_counter;
        }


            // Setters
        /**
         * @param MySQLConnectorWrapper|null $var
         * @throws Exception
         */
        public final function setWrapper( MySQLConnectorWrapper $var ): void
        {
            $this->connector = $var;
        }


        /**
         * @param int|null $idx
         */
        public final function setPaginationIndexValue( ?int $idx ): void
        {
            $counter = $this->getPaginationIndexCounter();
            $counter->setCurrent( $idx );
        }


        /**
         * @param int|null $var
         */
        public final function setLimitValue( ?int $var ): void
        {
            $counter = $this->getLimitCounter();
            $counter->setCurrent( $var );
        }


        /**
         * @param CounterObject|null $pagination_index_counter
         */
        public final function setPaginationIndexCounter( ?CounterObject $pagination_index_counter ): void
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




    }

?>