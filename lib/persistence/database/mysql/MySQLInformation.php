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
        final public function retrieve_username()
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
        final public function retrieve_password()
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
        final public function retrieve_hostname()
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
        final public function retrieve_port()
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
        final public function retrieve_database()
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
        final protected function validateAsCredential( $var )
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
        final protected function validateAsAccess( $var )
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
        final public function getCredential()
        {
            return $this->credential;
        }


        /**
         * @return mixed
         */
        final public function getAccess()
        {
            return $this->access;
        }


        /**
         * @return string|null
         */
        final public function getDatabase()
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
         * @return null
         * @throws Exception
         */
        final public function setAccess( $value )
        {
            if( is_null( $value ) )
            {
                $this->access = $value;
                return $this->access;
            }

            if( !$this->validateAsAccess( $value ) )
            {
                throw new Exception( 'MySQLInformation - setAccess: Only NetworkAccess class or Null is allowed' );
            }

            $this->access = $value;
        }


        /** Result: Allowed to be null or a instance of UserCredential
         * @param $value
         * @throws Exception
         */
        final public function setCredential( $value )
        {
            if( is_null( $this->credential ) )
            {
                $this->credential = $value;
                return $this->credential;
            }

            if( !$this->validateAsCredential( $value ) )
            {
                throw new Exception( 'MySQLInformation - setCredential: Only UserCredential class or Null is allowed' );
            }

            $this->credential = $value;
        }


        /** Result: Allowed to be null, or a instance of a string.
         * @param $value
         * @return null
         * @throws Exception
         */
        final public function setDatabase( $value )
        {
            if( is_null( $value ) )
            {
                $this->database = $value;
                return $this->database;
            }

            if( !is_string( $value ) )
            {
                throw new Exception( 'MySQLInformation - setDatabase: Only string or null is allowed' );
            }

            $this->database = strval( $value );
        }

    }

?>