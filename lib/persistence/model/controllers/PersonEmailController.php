<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface PersonEmailController
     */
    interface PersonEmailController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function setIdentity( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function setContent( $var );
    }

?>