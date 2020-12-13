<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class ProfileController
     */
    class ProfileController
        extends BaseMVCController
    {
        /**
         * @param ProfileModel|null $model
         * @throws Exception
         */
        public function __constructor( ?ProfileModel $model )
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

        public function getUsername()
        {

        }

        public function getPassword()
        {

        }

        public function getProfileType()
        {

        }
        
    }

?>