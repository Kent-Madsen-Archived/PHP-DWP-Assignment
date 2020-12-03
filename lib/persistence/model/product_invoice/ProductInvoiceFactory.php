<?php
    /**
     *  Title: ProductInvoiceFactory
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
     */

    /**
     * Class ProductInvoiceFactory
     */
    class ProductInvoiceFactory
        extends BaseFactoryTemplate
    {
        public const filter_by_profile_id = 'fpid';

        public const table = 'product_invoice';

        public const field_identity = 'identity';
        public const field_total_price = 'total_price';

        public const field_registered = 'registered';

        public const field_address_id = 'address_id';
        public const field_mail_id = 'mail_id';
        public const field_owner_name_id = 'owner_name_id';

        public const field_profile_id = 'profile_id';


        /**
         * ProductInvoiceFactory constructor.
         * @param $mysql_connector
         * @throws Exception
         */
        public function __construct( ?MySQLConnectorWrapper $mysql_connector )
        {
            $this->setupBase();
            $this->setWrapper( $mysql_connector );
            $this->setPaginationAndLimit(CONSTANT_FIVE, CONSTANT_ZERO);
        }

        private $filter = null;


        /**
         * @return string
         */
        public final static function getTableName(): string
        {
            return self::table;
        }


        /**
         * @return string
         */
        public final function getFactoryTableName(): string
        {
            return self::table;
        }

        /**
         * @return array|null
         */
        public final function getFilter(): ?array
        {
            return $this->filter;
        }


        /**
         * @param array $filter
         */
        public final function setFilter( array $filter ): void
        {
            $this->filter = $filter;
        }


        /**
         * @return bool
         * @throws Exception
         */
        public final function exist(): bool
        {
            $status_factory = new StatusOnFactory( $this->getWrapper() );
            
            $database = $this->getWrapper()->getInformation()->getDatabase();
            $value = $status_factory->getStatusOnTable( $database, self::table );
            
            return $value ;
        }


        /**
         * @param $var
         * @return bool
         */
        protected final function validateAsValidModel( $var ): bool
        {
            $retVal = false;

            if( $var instanceof ProductInvoiceModel )
            {
                $retVal = true;
            }

            return $retVal;
        }


        /**
         * @return ProductInvoiceModel
         * @throws Exception
         */
        public final function createModel(): ProductInvoiceModel
        {
            $model = new ProductInvoiceModel( $this );
            return $model;
        }


        /**
         * @return array
         * @throws Exception
         */
        public final function read(): array
        {
            $arr = null;

            if( is_null( $this->filter ) || count( $this->filter ) == 0 )
            {
                $arr = $this->readGlobal();
            }
            else
            {
                $arr = $this->readWithFilter();
            }

            return $arr;
        }


        /**
         * @return array
         * @throws Exception
         */
        private final function readGlobal(): array
        {
            $retVal = null;

            $table = self::table;
            $sql = "SELECT * FROM {$table} LIMIT ? OFFSET ?;";

            $stmt_limit  = null;
            $stmt_offset = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii",
                    $stmt_limit,
                    $stmt_offset );

                $stmt_limit  = $this->getLimitValue();
                $stmt_offset = $this->CalculateOffset();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $model = $this->createModel();

                        $model->setIdentity( $row[ self::field_identity ] );
                        $model->setTotalPrice( $row[ self::field_total_price ] );

                        $model->setRegistered( $row[ self::field_registered ] );

                        $model->setAddressId( $row[ self::field_address_id ] );
                        $model->setMailId( $row[ self::field_mail_id ] );
                        $model->setOwnerNameId( $row[ self::field_owner_name_id ] );

                        $model->setProfileId( $row[ self::field_profile_id ] );

                        array_push( $retVal, $model );
                    }
                }
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                $this->getWrapper()->disconnect();
            }

            return $retVal;
        }


        /**
         * @return array
         * @throws Exception
         */
        private final function readWithFilter(): array
        {
            $retVal = null;

            $table = self::table;
            $fpid = self::field_profile_id;

            $sql = "SELECT * FROM {$table} where {$fpid} = ?;";

            $stmt_prof_id = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "i", $stmt_prof_id );

                $stmt_prof_id  = $this->filter[self::filter_by_profile_id];

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {
                    $retVal = array();

                    while( $row = $result->fetch_assoc() )
                    {
                        $model = $this->createModel();

                        $model->setIdentity( $row[ self::field_identity ] );
                        $model->setTotalPrice( $row[ self::field_total_price ] );

                        $model->setRegistered( $row[ self::field_registered ] );

                        $model->setAddressId( $row[ self::field_address_id ] );
                        $model->setMailId( $row[ self::field_mail_id ] );
                        $model->setOwnerNameId( $row[ self::field_owner_name_id ] );

                        $model->setProfileId( $row[ self::field_profile_id ] );

                        array_push( $retVal, $model );
                    }
                }
            }
            catch( Exception $ex )
            {
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
        public final function readModel( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = false;

            $table = self::table;
            $fid = self::field_identity;

            $sql = "SELECT * FROM {$table} WHERE {$fid} = ?;";

            $stmt_comparator  = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "i",
                    $stmt_comparator );

                $stmt_comparator  = $model->getIdentity();

                // Executes the query
                $stmt->execute();

                $result = $stmt->get_result();

                if( $result->num_rows > CONSTANT_ZERO )
                {

                    while( $row = $result->fetch_assoc() )
                    {
                        $model = $this->createModel();

                        $model->setIdentity( $row[ self::field_identity ] );
                        $model->setProfileId( $row[ self::field_profile_id ] );

                        $model->setTotalPrice( $row[ self::field_total_price ] );
                        $model->setAddressId( $row[ self::field_address_id ] );
                        $model->setMailId( $row[ self::field_mail_id ] );
                        $model->setOwnerNameId( $row[ self::field_owner_name_id ] );

                        $model->setRegistered( $row[ self::field_registered ] );

                        $retVal = true;
                    }
                }
            }
            catch( Exception $ex )
            {
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
        public final function create( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $retVal = false;

            //
            $table = self::table;
            $ftp = self::field_total_price;
            $faid = self::field_address_id;
            $fmid = self::field_mail_id;
            $fonid = self::field_owner_name_id;
            $fpid = self::field_profile_id;

            $sql = "INSERT INTO {$table}( {$ftp}, {$faid}, {$fmid}, {$fonid}, {$fpid} ) VALUES( ?, ?, ?, ?, ? );";

            $stmt_total_price = null;

            $stmt_addr_id = null;
            $stmt_mail_id = null;
            $stmt_owner_id = null;
            $stmt_profile_id = null;

            //
            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                //
                $stmt->bind_param( "diiii",
                    $stmt_total_price,
                    $stmt_addr_id,
                    $stmt_mail_id,
                    $stmt_owner_id,
                    $stmt_profile_id );

                $stmt_total_price   = $model->getTotalPrice();
                $stmt_profile_id    = $model->getProfileId();

                $stmt_addr_id       = $model->getAddressId();
                $stmt_mail_id       = $model->getMailId();
                $stmt_owner_id      = $model->getOwnerNameId();

                // Executes the query
                $stmt->execute();

                // commits the statement
                $model->setIdentity( $this->getWrapper()->finishCommitAndRetrieveInsertId( $stmt ) );

                $retVal = true;
            }
            catch( Exception $ex )
            {
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
        public final function update( &$model ): bool
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }


            return false;
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

            $t = self::table;
            $fid = self::field_identity;

            $sql = "DELETE FROM {$t} WHERE {$fid} = ?;";

            $stmt_identity = null;

            $connection = $this->getWrapper()->connect();

            try
            {
                $stmt = $connection->prepare( $sql );

                //
                $stmt->bind_param( "i",
                    $stmt_identity );

                // Sets Statement Variables
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
         * @return int
         * @throws Exception
         */
        public final function length(): int
        {
            $retVal = CONSTANT_ZERO;

            $table_name = self::table;
            $sql = "SELECT count( * ) AS number_of_rows FROM {$table_name};";
            
            $connection = $this->getWrapper()->connect();

            try 
            {
                $stmt = $connection->prepare( $sql );
                
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
                $this->getWrapper()->disconnect();
            }

            return $retVal;
        }


        /**
         * @param array $filter
         * @return mixed|void
         */
        public final function lengthCalculatedWithFilter( array $filter )
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
        public final function insertOptions( array $filters ): bool
        {
            // TODO: Implement insertOptions() method.
            return false;
        }

    }

?>