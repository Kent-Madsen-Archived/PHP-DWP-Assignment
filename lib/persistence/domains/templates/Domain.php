<?php 

    /**
     * 
     */
    abstract class Domain
    {

        // Variables
        private $information = null;

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
            $this->information = $var;
        }
        
    }

?>