<?php
    /**
     *  Title: Domain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Abstract Class
     *  Project: DWP-Assignment
     */

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
        protected function validateInformation( $info ): bool
        {
            $retVal = false;

            if( is_null( $info ) || ( $info instanceof MySQLInformation ) )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        // Accessor
            // Getter
        /**
         * @return MySQLInformation|null
         */
        final public function getInformation(): ?MySQLInformation
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