<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class MySQLInformation
     */
    class MySQLInformation
        implements MySQLInformationInterface
    {
        // Constructors
        /**
         * MySQLInformation constructor.
         * @param $access
         * @param $credential
         * @param $database
         * @throws Exception
         */
        public function __construct( $access, 
                                     $credential, 
                                     $database )
        {
            $this->setAccess( $access );
            $this->setCredential( $credential );

            $this->setDatabase( $database );
        }

        
        // internal variables
        private $credential = null;
        private $database = null;

        private $access = null;


        // Accessor
        /**
         * @return string|null
         */
        final public function retrieveUsername() : ? string
        {
            if( is_null( $this->credential ) )
            {
                return null;
            }

            return strval( $this->credential->getUsername() );
        }


        /**
         * @return string|null
         */
        final public function retrievePassword() : ? string
        {
            if( is_null( $this->credential ) )
            {
                return null;
            }

            return strval( $this->credential->getPassword() );
        }


        /**
         * @return string|null
         */
        final public function retrieveHostname() : ? string
        {
            if( is_null( $this->access ) )
            {
                return null;
            }

            return strval( $this->access->getHostname() );
        }


        /**
         * @return int|null
         */
        final public function retrievePort() : ? int
        {
            if( is_null( $this->access ) )
            {
                return null;
            }

            return intval( $this->access->getPort() );
        }


        /**
         * @return string|null
         */
        final public function retrieveDatabase() : ? string
        {
            if( is_null( $this->database ) )
            {
                return null;
            }

            return strval( $this->getDatabase() );
        }


        // Functions
        /**
         * @param $var
         * @return bool
         */
        final protected function validateAsCredential( $var ) : bool
        {
            $retval = false;

            if( $var instanceof UserCredential )
            {
                $retval = true;
            }

            return boolval( $retval );
        }


        /**
         * @param $var
         * @return bool
         */
        final protected function validateAsAccess( $var ) : bool
        {
            $retVal = false;

            if( $var instanceof NetworkAccess )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return MySQLInformation
         * @throws Exception
         */
        final public static function generateDefaultMysql()
        {
            return new MySQLInformation( NetworkAccess::generateNetworkAccess(),
                                         UserCredential::generateDefaultUserCredential(),
                                'mysql' );
        }


        // Accessors
            // Getters
        /**
         * @return mixed
         */
        final public function getCredential(): ?UserCredential
        {
            if( is_null( $this->credential ) )
            {
                return null;
            }

            return $this->credential;
        }


        /**
         * @return mixed
         */
        final public function getAccess(): ?NetworkAccess
        {
            if( is_null( $this->access ) )
            {
                return null;
            }

            return $this->access;
        }


        /**
         * @return string|null
         */
        final public function getDatabase() : ?string
        {
            if( is_null( $this->database ) )
            {
                return null;
            }

            return strval( $this->database );
        }


            // Setters
        /** Result: Allowed to be null or a instance of NetworkAccess
         * @param $value
         * @return NetworkAccess|null
         * @throws Exception
         */
        final public function setAccess( $value ): ?NetworkAccess
        {
            if( is_null( $value ) )
            {
                $this->access = $value;
                return $this->getAccess();
            }

            if( !$this->validateAsAccess( $value ) )
            {
                throw new Exception( 'MySQLInformation - setAccess: Only NetworkAccess class or Null is allowed' );
            }

            $this->access = $value;

            return $this->getAccess();
        }


        /** Result: Allowed to be null or a instance of UserCredential
         * @param $value
         * @return UserCredential|null
         * @throws Exception
         */
        final public function setCredential( $value ): ?UserCredential
        {
            if( is_null( $this->credential ) )
            {
                $this->credential = $value;
                return $this->getCredential();
            }

            if( !$this->validateAsCredential( $value ) )
            {
                throw new Exception( 'MySQLInformation - setCredential: Only UserCredential class or Null is allowed' );
            }

            $this->credential = $value;

            return $this->getCredential();
        }


        /** Result: Allowed to be null, or a instance of a string.
         * @param $value
         * @return string|null
         * @throws Exception
         */
        final public function setDatabase( $value ) : ?string
        {
            if( is_null( $value ) )
            {
                $this->database = $value;
                return $this->getDatabase();
            }

            if( !is_string( $value ) )
            {
                throw new Exception( 'MySQLInformation - setDatabase: Only string or null is allowed' );
            }

            $this->database = strval( $value );

            return $this->getDatabase();
        }

    }

?>