<?php

    /**
     * Class SessionFixationSecurity
     */
    class SessionFixationSecurity
    {
        /**
         * SessionFixationSecurity constructor.
         * @throws Exception
         */
        public function __construct()
        {
            // 60 * 60 * 24, about 1 day
            $this->setTimespan(86400 );
            $this->setNow( time() );
        }

        //
        private $timespan = null;
        private $now = null;


        /**
         * @throws Exception
         */
        function update(): void
        {
            $now = time();

            if( !$this::existSessionGenerated() )
            {
                $this::setSessionGenerated( $now );
            }
            else
            {
                if( $this::getSessionGenerated() < $this::calculateDifference() )
                {
                    session_regenerate_id();
                    $this::setSessionGenerated( time() );
                }
            }
        }


        /**
         * @return int
         * @throws Exception
         */
        function calculateDifference(): int
        {
            if( is_null( $this->getNow() ) || is_null( $this->getTimespan() ) )
            {
                SecurityErrors::throwCantCalculateDifference();
            }

            return intval( ( $this->getNow() - $this->getTimespan() ) );
        }


        /**
         * @return int|null
         */
        public function getNow()
        {
            if( is_null( $this->now ) )
            {
                return null;
            }

            return intval( $this->now );
        }


        /**
         * @return int|null
         */
        public function getTimespan(): ?int
        {
            if( is_null( $this->timespan ) )
            {
                return null;
            }

            return intval( $this->timespan );
        }


        /**
         * @param $now
         * @return int|null
         * @throws Exception
         */
        public function setNow( $now ): ?int
        {
            if( is_null( $now ) )
            {
                $this->now = null;
                return $this->getNow();
            }

            if( !is_int( $now ) )
            {
                SecurityErrors::throwErrorParameterIsNotInt();
            }

            $this->now = intval( $now );
            return $this->getNow();
        }


        /**
         * @param int $timespan
         * @return int|null
         * @throws Exception
         */
        public function setTimespan( int $timespan ): ?int
        {
            if( is_null( $timespan ) )
            {
                $this->timespan = null;
                return $this->getTimespan();
            }

            if( !is_int( $timespan ) )
            {
                SecurityErrors::throwErrorParameterIsNotInt();
            }

            $this->timespan = intval( $timespan );
            return $this->getTimespan();
        }


        /**
         * @param $var
         * @return int|null
         * @throws Exception
         */
        public final static function setSessionGenerated( $var ): ?int
        {
            if( is_null( $var ) )
            {
                $_SESSION[ 'session_generated' ] = null;
            }

            if( !is_int( $var ) )
            {
                SecurityErrors::throwErrorParameterIsNotInt();
            }

            $_SESSION[ 'session_generated' ] = intval( $var );
            return self::getSessionGenerated();
        }


        /**
         * @return int|null
         */
        public final static function getSessionGenerated(): ?int
        {
            if( !self::existSessionGenerated() )
            {
                return null;
            }

            if( is_null( $_SESSION[ 'session_generated' ] ) )
            {
                return null;
            }

            return intval( $_SESSION[ 'session_generated' ] );
        }


        /**
         * @return bool
         */
        public final static function existSessionGenerated(): bool
        {
            return isset( $_SESSION[ 'session_generated' ] );
        }

    }

?>