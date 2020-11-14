<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ProfileController
     */
    interface ProfileController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function setUsername( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function setPassword( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function setIdentity( $var );    
        
    }

?>