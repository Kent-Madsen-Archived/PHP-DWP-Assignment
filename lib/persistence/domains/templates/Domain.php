<?php 

    /**
     * 
     */
    abstract class Domain
    {

        // Variables
        private $information = null;


        /**
         * 
         */
        protected function validateInformation( $info )
        {
            if( is_null( $info ) || ( $info instanceof MySQLInformation ) )
            {
                return true;
            }

            return false;
        }


        // Accessor
            // Getter
        /**
         * 
         */
        final public function getInformation()
        {
            return $this->information;
        }


            // Setter
        /**
         * 
         */
        final public function setInformation( $var )
        {
            if( !$this->validateInformation( $var ) )
            {
                throw new Exception( '' );
            }

            $this->information = $var;
        }
        
    }

?>