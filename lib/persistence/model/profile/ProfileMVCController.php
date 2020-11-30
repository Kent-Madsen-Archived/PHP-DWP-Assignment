<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProfileController
     */
    class ProfileMVCController
        extends BaseMVCController
    {
        /**
         * @param $model
         * @throws Exception
         */
        public function __constructor( $model )
        {
            $this->setModel( $model );
        }


        /**
         * @param $model
         * @return bool
         */
        public function validateModel( $model ): bool
        {
            // TODO: Implement validateModel() method.
            return false;
        }


        /**
         * @param $var
         */
        public function controllerUsername( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerPassword( $var ): void
        {

        }


        /**
         * @param $var
         */
        public function controllerProfileType( $var ): void
        {

        }
        
    }

?>