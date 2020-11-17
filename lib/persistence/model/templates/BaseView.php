<?php 

    abstract class BaseView
    {
        private $model = null;

        public function getModel()
        {
            return $this->model;
        }

        
        public function setModel( $model )
        {
            if( !$this->validateModel( $model ) )
            {
                throw new Exception('Wrong Model');
            }

            $this->model = $model;
        }

        abstract public function validateModel( $model );

    }

?>