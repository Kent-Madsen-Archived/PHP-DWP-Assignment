<?php

    /**
     * Class SessionFixationSecurity
     */
    class SessionFixationSecurity
    {
        /**
         * SessionFixationSecurity constructor.
         */
        public function __construct()
        {
            $this->setTimespan(1440 );
            $this->setNow( time() );
        }

        //
        private $timespan = null;
        private $now = null;


        /**
         *
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
                throw new Exception('can\'t calculate difference as either now or timespan is null ');
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
                throw new Exception('');
            }

            $this->now = intval( $now );
            return $this->getNow();
        }


        /**
         * @param int $timespan
         * @return int
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
                throw new Exception();
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
                throw new Exception('');
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