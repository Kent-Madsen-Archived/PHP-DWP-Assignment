<?php

    /**
     * Class BaseMVC
     */
    abstract class BaseMVC
    {
        // Variables
        private $model = null;


        // Accessors
        /**
         * @return null
         * @throws Exception
         */
        final public function getModel()
        {
            if( is_null( $this->model ) )
            {
                return null;
            }

            if( $this->validateModel( $this->model ) )
            {
                return $this->model;
            }
            else
            {
                throw new Exception('');
            }
        }


        /**
         * @param $model
         * @return null
         * @throws Exception
         */
        final public function setModel( $model )
        {
            if( is_null( $model ) )
            {
                $this->model = null;
                return $this->model;
            }

            if( !$this->validateModel( $model ) )
            {
                throw new Exception('Wrong Model');
            }

            $this->model = $model;
            return $this->getModel();
        }


        // Template
        /**
         * @param $model
         * @return bool
         */
        public abstract function validateModel( $model ): bool;
    }

?>