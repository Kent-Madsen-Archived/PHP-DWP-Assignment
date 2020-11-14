<?php

    /**
     * Class Domain
     */
    abstract class Domain
    {

        // Variables
        private $information = null;


        /**
         * @param $info
         * @return bool
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
         * @return null
         */
        final public function getInformation()
        {
            return $this->information;
        }


            // Setter
        /**
         * @param $var
         * @throws Exception
         */
        final public function setInformation( $var )
        {
            if( !$this->validateInformation( $var ) )
            {
                throw new Exception( 'Error: Only null or MySQLInformation class is allowed' );
            }

            $this->information = $var;
        }
        
    }

?>