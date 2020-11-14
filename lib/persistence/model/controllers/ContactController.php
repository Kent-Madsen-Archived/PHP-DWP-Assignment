<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Interface ContactController
     */
    interface ContactController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function setFromMail( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function setToMail( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function setSubject( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function setMessage( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function setHasBeenSend( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function setCreatedOn( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function setIdentity( $var );
    }
?>