<?php

    /**
     * Class BaseController
     */
    abstract class BaseController
    {
        // Variables
        private $model = null;


        // Accessors
        /**
         * @return null
         */
        final public function getModel()
        {
            return $this->model;
        }


        /**
         * @param $model
         * @throws Exception
         */
        final public function setModel( $model )
        {
            if( !$this->validateModel( $model ) )
            {
                throw new Exception('Wrong Model');
            }

            $this->model = $model;
        }

        // Template
        public abstract function validateModel( $model ): bool;
    }

?>