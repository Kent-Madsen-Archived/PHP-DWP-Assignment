<?php
    class CounterObject
    {
        public function __construct( int $start_position = 0 )
        {
            $this->setCurrent( $start_position );
        }

        // Variables
        private $current = null;


        /**
         *
         */
        public final function reset()
        {
            $this->setCurrent(CONSTANT_ZERO );
        }


        /**
         * @param int $idx
         * @return int|null
         */
        public final function increase( int $idx ): ?int
        {
            $increased = $this->getCurrent() + $idx;
            $this->setCurrent( $increased );

            return $this->getCurrent();
        }

        public final function projectIncrease( int $value): ?int
        {
            return $this->getCurrent() + $value;
        }

        public final function projectDecrease( int $value ): ?int
        {
            return $this->getCurrent() - $value;
        }


        /**
         * @return int|null
         */
        public final function increment(): ?int
        {
            $this->increase(CONSTANT_ONE);
            return $this->getCurrent();
        }


        /**
         * @param int $idx
         * @return int|null
         */
        public final function decrease( int $idx ): ?int
        {
            $decrease = $this->getCurrent() - $idx;
            $this->setCurrent( $decrease );
            return $this->getCurrent();
        }


        /**
         * @param int $value
         * @return int|null
         */
        public final function multiplyWith( int $value ): ?int
        {
            $value = $this->getCurrent() * $value;
            $this->setCurrent( $value );
            return $this->getCurrent();
        }


        /**
         * @return int|null
         */
        public final function decrement(): ?int
        {
            $this->decrease(CONSTANT_ONE);
            return $this->getCurrent();
        }

        // Accessor
        /**
         * @return int|null
         */
        public final function getCurrent(): ?int
        {
            return $this->current;
        }


        /**
         * @param int|null $current
         */
        public final function setCurrent( ?int $current ): void
        {
            $this->current = $current;
        }

        /**
         * @return bool
         */
        public final function isCurrentNull(): bool
        {
            return is_null( $this->current );
        }
    }
?>