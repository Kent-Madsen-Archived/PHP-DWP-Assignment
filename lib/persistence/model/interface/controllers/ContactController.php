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
        extends BaseEntityController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function controllerSubject( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerMessage( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerHasBeenSend( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerToMail( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerFrom( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerCreatedOn( $var );
    }
?>