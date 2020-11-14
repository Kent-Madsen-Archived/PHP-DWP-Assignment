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
        private $credential;        
        private $database;

        private $access;

        // Accessor
        /**
         * @return mixed
         */
        final public function retrieve_username()
        {
            return $this->credential->getUsername();
        }

        /**
         * @return mixed
         */
        final public function retrieve_password()
        {
            return $this->credential->getPassword();
        }

        /**
         * @return mixed
         */
        final public function retrieve_hostname()
        {
            return $this->access->getHostname();
        }

        /**
         * @return mixed
         */
        final public function retrieve_port()
        {
            return $this->access->getPort();
        }

        /**
         * @return mixed
         */
        final public function retrieve_database()
        {
            return $this->getDatabase();
        }

        // Functions
        /**
         * @param $var
         * @return bool
         */
        final protected function validateAsCredential( $var )
        {
            if( is_null( $var ) )
            {
                return true;
            }

            if( $var instanceof UserCredential )
            {
                return true;
            }

            return false;
        }

        /**
         * @param $var
         * @return bool
         */
        final protected function validateAsAccess( $var )
        {
            if( is_null( $var ) )
            {
                return true;
            }

            if( $var instanceof NetworkAccess )
            {
                return true;
            }

            return false;
        }

        /**
         * @return MySQLInformation
         * @throws Exception
         */
        final public static function generateDefaultMysql()
        {
            return new MySQLInformation(NetworkAccess::generateNetworkAccess(), UserCredential::generateDefaultUserCredential(), 'mysql');
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
         * @return mixed
         */
        final public function getDatabase()
        {
            return $this->database;
        }

            // Setters
        /** Result: Allowed to be null or a instance of NetworkAccess
         * @param $value
         * @throws Exception
         */
        final public function setAccess( $value )
        {
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
            if( !$this->validateAsCredential( $value ) )
            {
                throw new Exception( 'MySQLInformation - setCredential: Only UserCredential class or Null is allowed' );
            }

            $this->credential = $value;
        }

        /** Result: Allowed to be null, or a instance of a string.
         * @param $value
         * @throws Exception
         */
        final public function setDatabase( $value )
        {
            if( is_null( $value ) )
            {
                $this->credential = $value;   
                return;
            }

            if( !is_string( $value ) )
            {
                throw new Exception( 'MySQLInformation - setDatabase: Only string or null is allowed' );
            }

            $this->database = $value;
        }

    }

?>