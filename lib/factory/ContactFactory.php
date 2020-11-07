<?php

    class ContactFactory
    {
        //
        function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }

        //
        private $connector = null;

        public function insert_request( $model )
        {

        }


        //
        public function getConnector()
        {
            return $this->connector;
        }

        public function setConnector( $var )
        {
            $this->connector = $var;

            print_r( $this->connector );
        }



    }

?>