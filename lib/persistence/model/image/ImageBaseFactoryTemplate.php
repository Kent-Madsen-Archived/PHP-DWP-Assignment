<?php
    /**
     *  Title: ImageFactory
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */


    /**
     * Class ImageFactory
     */
    class ImageBaseFactoryTemplate
        extends BaseFactoryTemplate
    {
        /**
         * ImageFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( $mysql_connector )
        {
            $this->setWrapper( $mysql_connector );
            $this->setPaginationAndLimit(CONSTANT_FIVE, CONSTANT_ZERO);
        }


        /**
         * @return string
         */
        final public static function getTableName()
        {
            return 'image';
        }


        /**
         * @return mixed|string
         */
        final public function getFactoryTableName():string
        {
            return self::getTableName();
        }


        /**
         * @return string
         */
        final public static function getViewName()
        {
            return 'ImageView';
        }


        /**
         * @return string
         */
        final public static function getControllerName()
        {
            return 'ImageController';
        }


        /**
         * @return bool|mixed
         * @throws Exception
         */
        final public function exist(): bool
        {
            $status_factory = new StatusFactory( $this->getWrapper() );
            
            $database = $this->getWrapper()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::getTableName() );
            
            return boolval( $value );
        }


        /**
         * @return ImageModelEntity|mixed
         */
        final public function createModel(): ImageModelEntity
        {
            $model = new ImageModelEntity( $this );
            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        final public function validateAsValidModel( $var ): bool
        {
            $retVal = false;

            if( $var instanceof ImageModelEntity )
            {
                $retVal = true;
            }

            return boolval( $retVal );
        }


        /**
         * @return array|null
         * @throws Exception
         */
        final public function read(): ?array
        {
            // return array
            $retVal = null;

            // sql, that the prepared statement uses
            $sql = "SELECT * FROM image LIMIT ? OFFSET ?;";

            // prepare statement variables
            $stmt_limit  = null;
            $stmt_offset = null;

            // opens a connection to a mysql database
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii",
                                    $stmt_limit,
                                    $stmt_offset );

                $stmt_limit  = $this->getLimit();
                $stmt_offset = $this->CalculateOffset();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

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
                $this->getWrapper()->disconnect();
            }

            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        final public function readModel( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // return array
            $retVal = false;

            // sql, that the prepared statement uses
            $sql = "SELECT * FROM image WHERE identity = ?;";

            // prepare statement variables
            $stmt_identity  = null;

            // opens a connection to a mysql database
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "i",
                    $stmt_identity );

                $stmt_identity  = $this->getIdentity();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $model->setIdentity( $row[ 'identity' ] );

                        $model->setImageSrc( $row[ 'image_src' ] );
                        $model->setImageTypeId( $row[ 'image_type_id' ] );

                        $model->setTitle( $row[ 'title' ] );
                        $model->setAlt( $row[ 'alt' ] );

                        $model->setParentId( $row[ 'parent_id' ] );

                        $model->setRegistered( $row[ 'registered' ] );
                        $model->setLastUpdated( $row[ 'last_updated' ] );

                        $retVal = true;
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
                $this->getWrapper()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @param $model
         * @return mixed|void
         * @throws Exception
         */
        final public function create( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = false;

            $sql = "INSERT INTO image( image_src, image_type_id, title, alt, parent_id ) VALUES( ?, ?, ?, ?, ? );";

            $stmt_image_src = null;
            $stmt_image_type_id = null;

            $stmt_title = null;
            $stmt_alt     = null;

            $stmt_parent_id   = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "sissi",
                    $stmt_image_src,
                    $stmt_image_type_id,
                    $stmt_title,
                    $stmt_alt,
                    $stmt_parent_id );

                // Setup variables
                $stmt_image_src     = $model->getImageSrc();
                $stmt_image_type_id = $model->getImageTypeId();

                $stmt_title     = $model->getTitle();
                $stmt_alt       = $model->getAlt();

                $stmt_parent_id   = $model->getParentId();

                // Executes the query
                $stmt->execute();

                // Apply Identity
                $model->setIdentity( $this->getWrapper()->finishCommitAndRetrieveInsertId( $stmt ) );
                $retVal = true;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getWrapper()->undoState();
                throw new Exception( "Error: " . $ex );
            }
            finally
            {
                // Leaves the connection.
                $this->getWrapper()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        final public function delete( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = false;

            $sql = "DELETE FROM image WHERE identity = ?;";

            $stmt_identity = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                //
                $stmt->bind_param( "i",
                    $stmt_identity );

                //
                $stmt_identity = $model->getIdentity();

                // Executes the query
                $stmt->execute();

                // commits the statement
                $this->getWrapper()->finish();
                $retVal = true;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getWrapper()->undoState();
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getWrapper()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        final public function update( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = false;

            $sql = "UPDATE image SET image_src = ?, image_type_id = ?, title = ?, alt = ?, parent_id = ? WHERE identity = ?;";

            $stmt_image_src     = null;
            $stmt_image_type_id = null;

            $stmt_title     = null;
            $stmt_alt       = null;
            $stmt_parent_id = null;

            $stmt_identity = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "sissi",
                    $stmt_image_src,
                    $stmt_image_type_id,
                    $stmt_title,
                    $stmt_alt,
                    $stmt_parent_id,
                    $stmt_identity );

                // Setup variables
                $stmt_image_src     = $model->getImageSrc();
                $stmt_image_type_id = $model->getImageTypeId();

                $stmt_title     = $model->getTitle();
                $stmt_alt       = $model->getAlt();

                $stmt_parent_id   = $model->getParentId();

                $stmt_identity = $model->getIdentity();

                // Executes the query
                $stmt->execute();

                // Apply Identity
                $model->setIdentity( $this->getWrapper()->finish() );
                $retVal = true;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getWrapper()->undoState();
                throw new Exception( "Error: " . $ex );
            }
            finally
            {
                // Leaves the connection.
                $this->getWrapper()->disconnect();
            }

            return boolval( $retVal );
        }


        /**
         * @return int
         * @throws Exception
         */
        final public function length(): int
        {
            $retVal = CONSTANT_ZERO;

            // SQL query
            $table_name = self::getTableName();
            $sql = "SELECT count( * ) AS number_of_rows FROM {$table_name};";

            // opens a connection to the database
            $local_connection = $this->getWrapper()->connect();

            try 
            {
                $stmt = $local_connection->prepare( $sql );
                
                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $retVal = $row[ 'number_of_rows' ];
                    }
                }  
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                //
                $this->getWrapper()->disconnect();
            }

            return intval( $retVal );
        }


        /**
         * @param $classObject
         * @return bool
         * @throws Exception
         */
        final public function classHasImplementedView( $classObject )
        {
            $retVal = false;

            if( is_null( $classObject ) )
            {
                throw new Exception('ArticleFactory - Static Function - classHasImplementedView, classObject is null, function only accepts classes');
            }

            if( !is_object( $classObject ) )
            {
                throw new Exception('ArticleFactory - Static Function - classHasImplementedView, classObject is not a object., function only accepts classes');
            }

            if( BaseFactoryTemplate::ModelImplements( $classObject, self::getViewName() ) )
            {
                $retVal = true;
                return boolval( $retVal );
            }

            return boolval( $retVal );
        }
    }

?>