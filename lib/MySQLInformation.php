<?php 

    /**
     * 
     */
    class MySQLInformation
    {
        // Constructors
        /**
         * 
         */
        public function __construct( $access, $credential, $database )
        {
            $this->setAccess( $access );
            $this->setCredential( $credential );
            $this->setDatabase( $database );
        }
        
        // internal variables
        private $credential;        
        private $database;

        private $access;
        
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
         * 
         */
        final public function setAccess( $var )
        {
            $this->access = $var;
        }

        /**
         * 
         */
        final public function setCredential( $var )
        {
            $this->credential = $var;
        }

        /**
         * 
         */
        final public function setDatabase( $var )
        {
            $this->database = $var;
        }

    }

?>