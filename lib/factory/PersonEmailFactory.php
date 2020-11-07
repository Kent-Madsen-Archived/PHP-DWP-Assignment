<?php 

    class PersonEmailFactory
    {
        function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }

        private $connector = null;

        public function get()
        {

        }

        public function get_by_name( $email )
        {
            $retVal = array();

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "select * from person_email where content = ?;";

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "s", $email );
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model = new PersonEmailModel( $this );
                        
                        $model->setIdentity( $row['identity'] );
                        $model->setContent( $row['content'] );

                        array_push( $retVal, $model );
                    }
                }
            }
            catch( Exception $ex )
            {

            }
            finally
            {
                $this->getConnector()->disconnect();
            }
            return $retVal;
        }

        /**
         * 
         */
        public function getConnector()
        {
            return $this->connector;
        }

        /**
         * 
         */
        public function setConnector( $var )
        {
            $this->connector = $var;
        }
    }

?>