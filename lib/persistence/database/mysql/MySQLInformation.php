<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    class MySQLInformation
    {
        // Constructors
        /**
         * 
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

        //
        final public function retrieve_username()
        {
            return $this->credential->getUsername();
        }

        final public function retrieve_password()
        {
            return $this->credential->getPassword();
        }

        final public function retrieve_hostname()
        {
            return $this->access->getHostname();
        }

        final public function retrieve_port()
        {
            return $this->access->getPort();
        }

        final public function retrieve_database()
        {
            return $this->getDatabase();
        }

        // Functions
        /**
         * 
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
        * 
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

        
        // Accessors
            // Getters
        /**
         * 
         */
        final public function getCredential()
        {
            return $this->credential;
        }

        /**
         * 
         */
        final public function getAccess()
        {
            return $this->access;
        }

        /**
         * 
         */
        final public function getDatabase()
        {
            return $this->database;
        }

            // Setters 
        /**
         * Result: Allowed to be null or a instance of NetworkAccess
         */
        final public function setAccess( $value )
        {
            if( !$this->validateAsAccess( $value ) )
            {
                throw new Exception( 'MySQLInformation - setAccess: Only NetworkAccess class or Null is allowed' );
            }

            $this->access = $value;
        }

        /**
         * Result: Allowed to be null or a instance of UserCredential
         */
        final public function setCredential( $value )
        {
            if( !$this->validateAsCredential( $value ) )
            {
                throw new Exception( 'MySQLInformation - setCredential: Only UserCredential class or Null is allowed' );
            }

            $this->credential = $value;
        }

        /**
         * 
         * Result: Allowed to be null, or a instance of a string.
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