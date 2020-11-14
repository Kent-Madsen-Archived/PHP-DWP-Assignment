<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */


    /**
     * 
     */
    class ImageFactory 
        extends Factory
    {
        /**
         * 
         */
        final public static function getTableName()
        {
            return 'image';
        }


        /**
         * 
         */
        final public function getFactoryTableName()
        {
            return self::getTableName();
        }


        /**
         * 
         */
        public function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }


        /**
         * TODO: This
         */
        final public function setup()
        {
            
        }


        /**
         * TODO: This
         */
        final public function setupSecondaries()
        {
            
        }

        
        /**
         * TODO: This
         */
        final public function insert_base_data()
        {

        }


        /**
         * 
         */
        final public function exist_database()
        {
            $status_factory = new StatusFactory( $this->getConnector() );
            
            $database = $this->getConnector()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::getTableName() );
            
            return $value;
        }


        /**
         * 
         */
        final public function createModel()
        {
            $model = new ImageModel( $this );

            return $model;
        }


        /**
         * 
         */
        final public function validateAsValidModel( $var )
        {
            if( $var instanceof ImageModel )
            {
                return true;
            }

            return false;
        }


        /**
         * 
         */
        public function read()
        {

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            // return array
            $retVal = array();

            // sql, that the prepared statement uses
            $sql = "SELECT * FROM image LIMIT ? OFFSET ?;";

            // prepare statement variables
            $stmt_limit  = null;
            $stmt_offset = null;

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii",
                                    $stmt_limit,
                                    $stmt_offset );

                $stmt_limit  = $this->getLimit();
                $stmt_offset = $this->calculateOffset();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $brought = $this->createModel();

                        $brought->setIdentity( $row[ 'identity' ] );
                        
                        $brought->setImageSrc( $row[ 'image_src' ] );
                        $brought->setImageTypeId( $row[ 'image_type_id' ] );
                        
                        $brought->setTitle( $row[ 'title' ] );
                        $brought->setAlt( $row[ 'alt' ] );
                        
                        $brought->setParentId( $row[ 'parent_id' ] );

                        $brought->setRegistered( $row[ 'registered' ] );
                        $brought->setLastUpdated( $row[ 'last_updated' ] );

                        array_push( $retVal, $brought );
                    }
                }
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error: ' . $ex );
            }
            finally
            {
                //
                $this->getConnector()->disconnect();
            }

            return $retVal;
        }


        /**
         * 
         */
        final public function read_model( $model )
        {
            $retVal = null;

            return $retVal;
        }


        /**
         * TODO: This
         */
        public function create( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

        }


        /**
         * TODO: This
         */
        public function delete( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
        }


        /**
         * TODO: This
         */
        public function update( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }
            
        }


        /**
         * 
         */
        final public function length()
        {
            
            $retVal = 0;

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "SELECT count( * ) AS number_of_rows FROM " . self::getTableName() . ";";

            try 
            {
                $stmt = $connection->prepare( $sql );
                
                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $retVal = $row[ 'number_of_rows' ];
                    }
                }  
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getConnector()->undo_state();

                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                //
                $this->getConnector()->disconnect();
            }

            return $retVal;
        }
    }

?>