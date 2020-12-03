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
    class ImageFactory
        extends BaseFactoryTemplate
    {
        public const table = 'image';

        public const field_identity = 'identity';
        public const field_image_src = 'image_src';

        public const field_image_type_id = 'image_type_id';

        public const field_title = 'title';
        public const field_alt = 'alt';

        public const field_parent_id = 'parent_id';

        public const field_registered = 'registered';
        public const field_last_updated = 'last_updated';

        /**
         * ImageFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( ?MySQLConnectorWrapper $mysql_connector )
        {
            $this->setupBase();
            $this->setWrapper( $mysql_connector );
            $this->setPaginationAndLimit(CONSTANT_FIVE, CONSTANT_ZERO);
        }


        /**
         * @return string
         */
        public final static function getTableName(): string
        {
            return self::table;
        }


        /**
         * @return mixed|string
         */
        public final function getFactoryTableName():string
        {
            return self::table;
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function exist(): bool
        {
            $status_factory = new StatusOnFactory( $this->getWrapper() );
            
            $database = $this->getWrapper()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::getTableName() );
            
            return $value;
        }


        /**
         * @return ImageModel
         * @throws Exception
         */
        public final function createModel(): ImageModel
        {
            $model = new ImageModel( $this );
            return $model;
        }


        /**
         * @param $var
         * @return bool
         */
        public final function validateAsValidModel( $var ): bool
        {
            $retVal = false;

            if( $var instanceof ImageModel )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return array|null
         * @throws Exception
         */
        public final function read(): ?array
        {
            // return array
            $retVal = null;

            // sql, that the prepared statement uses
            $table = self::table;
            $sql = "SELECT * FROM {$table} LIMIT ? OFFSET ?;";

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

                $stmt_limit  = $this->getLimitValue();
                $stmt_offset = $this->CalculateOffset();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $brought = $this->createModel();

                        $brought->setIdentity( $row[ self::field_identity ] );
                        
                        $brought->setImageSrc( $row[ self::field_image_src ] );
                        $brought->setImageTypeId( $row[ self::field_image_type_id ] );
                        
                        $brought->setTitle( $row[ self::field_title ] );
                        $brought->setAlt( $row[ self::field_alt ] );
                        
                        $brought->setParentId( $row[ self::field_parent_id ] );

                        $brought->setRegistered( $row[ self::field_registered ] );
                        $brought->setLastUpdated( $row[ self::field_last_updated ] );

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
        public final function readModel( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            // return array
            $retVal = false;

            // sql, that the prepared statement uses
            $table = self::table;
            $fid = self::field_identity;

            $sql = "SELECT * FROM {$table} WHERE {$fid} = ?;";

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
                        $model->setIdentity( $row[ self::field_identity] );

                        $model->setImageSrc( $row[ self::field_image_src ] );
                        $model->setImageTypeId( $row[ self::field_image_type_id ] );

                        $model->setTitle( $row[ self::field_title ] );
                        $model->setAlt( $row[ self::field_alt ] );

                        $model->setParentId( $row[ self::field_parent_id ] );

                        $model->setRegistered( $row[ self::field_registered] );
                        $model->setLastUpdated( $row[ self::field_last_updated ] );

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
        public final function create( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = false;

            $table = self::table;
            $fis = self::field_image_src;
            $fitid = self::field_image_type_id;
            $ft = self::field_title;
            $fa = self::field_alt;
            $fp_id = self::field_parent_id;

            $sql = "INSERT INTO {$table}( {$fis}, {$fitid}, {$ft}, {$fa}, {$fp_id} ) VALUES( ?, ?, ?, ?, ? );";

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

            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        public final function delete( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = false;

            $table = self::table;
            $fid = self::field_identity;

            $sql = "DELETE FROM {$table} WHERE {$fid} = ?;";

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

            return $retVal;
        }


        /**
         * @param $model
         * @return bool
         * @throws Exception
         */
        public final function update( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = false;

            $table = self::table;
            $fis = self::field_image_src;
            $fit_id = self::field_image_type_id;
            $ft = self::field_title;
            $fa = self::field_alt;
            $fp_id = self::field_parent_id;
            $fid = self::field_identity;

            $sql = "UPDATE {$table} SET {$fis} = ?, {$fit_id} = ?, {$ft} = ?, {$fa} = ?, {$fp_id} = ? WHERE {$fid} = ?;";

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

            return $retVal;
        }


        /**
         * @return int
         * @throws Exception
         */
        public final function length(): int
        {
            $retVal = CONSTANT_ZERO;

            // SQL query
            $table_name = self::table;
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

            return $retVal;
        }


        /**
         * @param array $filter
         * @return mixed|void
         */
        public final function lengthCalculatedWithFilter(array $filter): int
        {
            // TODO: Implement lengthCalculatedWithFilter() method.
            return 0;
        }


        /**
         * @return string
         */
        public final function appendices(): string
        {
            // TODO: Implement appendices() method.
            return "";
        }


        /**
         * @param array $filters
         * @return bool
         */
        public final function insertOptions(array $filters): bool
        {
            // TODO: Implement insertOptions() method.
            return false;
        }


    }

?>