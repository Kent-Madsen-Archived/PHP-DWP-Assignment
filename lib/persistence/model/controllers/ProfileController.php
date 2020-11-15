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
        extends BaseEntityController
    {
        /**
         * @param $var
         * @return mixed
         */
        public function controllerUsername( $var );

        /**
         * @param $var
         * @return mixed
         */
        public function controllerPassword( $var );


        /**
         * @param $var
         * @return mixed
         */
        public function controllerProfileType( $var );
        
    }

?>