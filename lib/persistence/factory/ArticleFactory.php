<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    class ArticleFactory 
        extends Factory
    {
        /**
         * 
         */
        final public static function getTableName()
        {
            return 'article';
        }
        
        /**
         * 
         */
        function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }

        /**
         * 
         */
        final public function createModel()
        {
            $model = new ArticleModel( $this );

            return $model;
        }

        /**
         * 
         */
        final public function setup()
        {
            
        }

        /**
         * 
         */
        final public function setupSecondaries()
        {
            
        }

        /**
         * 
         */
        final public function exist_database()
        {
            $status_factory = new StatusFactory( $this->getConnector() );
            
            $value = $status_factory->getStatusOnTable( 'dwp_assignment', self::getTableName() );
            
            return $value;
        }

        /**
         * 
         */
        final public function validateAsValidModel( $var )
        {
            if( $var instanceof ArticleModel )
            {
                return true;
            }

            return false;
        }
        
        /**
         * 
         */
        final public function read()
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
            $sql = "SELECT * FROM article LIMIT ? OFFSET ?;";

            // prepare statement variables
            $stmt_limit = null;
            $stmt_offset = null;

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii", 
                                   $stmt_limit, 
                                   $stmt_offset );

                $stmt_limit = $this->getLimit();
                $stmt_offset = $this->calculateOffset();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $articleModel = $this->createModel();
                        
                        $articleModel->setIdentity( $row[ 'identity' ] );
                        
                        $articleModel->setTitle( $row[ 'title' ] );
                        $articleModel->setContent( $row[ 'article_content' ] );

                        $articleModel->setCreatedOn( $row[ 'created_on' ] );
                        $articleModel->setLastUpdated( $row[ 'last_update' ] );
    
                        array_push( $retVal, $articleModel );
                    }
                }    
            }
            catch( Exception $ex )
            {
                throw new Exception( 'Error: ' . $ex );
            }

            //

            $this->getConnector()->disconnect();   

            return $retVal;
        }


        /**
         * 
         */
        final public function create( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception( 'Not accepted model' );
            }

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            $retVal = null;

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "INSERT INTO article( title, article_content ) VALUES( ?, ? )";

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ss", 
                                    $stmt_title, 
                                    $stmt_content );

                $stmt_title = $model->getTitle();
                $stmt_content = $model->getContent();

                // Executes the query
                $stmt->execute();

                // commits the statement
                $this->getConnector()->finish();

                $model->setIdentity( $stmt->insert_id );
                $retVal = $model;
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getConnector()->undo_state();

                echo $ex;
                throw new Exception( 'Error:' . $ex );
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
        final public function update( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception('Not accepted model');
            }

            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "UPDATE article SET title = ?, article_content = ? WHERE identity = ?";

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ssi", 
                                    $stmt_title, 
                                    $stmt_content, 
                                    $stmt_identity );

                $stmt_identity = $model->getIdentity();

                $stmt_title    = $model->getTitle();
                $stmt_content  = $model->getContent();

                $stmt->execute();

                // commits the statement
                $this->getConnector()->finish();
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getConnector()->undo_state();

                echo $ex;
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                //
                $this->getConnector()->disconnect();
            }

            return $model;
        }


        /**
         * 
         */
        final public function delete( $model )
        {
            if( !$this->validateAsValidModel( $model ) )
            {
                throw new Exception('Not accepted model');
            }
            
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "DELETE FROM article WHERE identity = ?;";

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "i", 
                                    $stmt_identity );

                $stmt_identity = $model->getIdentity();

                $stmt->execute();

                // commits the statement
                $this->getConnector()->finish();   
            }
            catch( Exception $ex )
            {
                // Rolls back, the changes
                $this->getConnector()->undo_state();

                echo $ex;
                throw new Exception( 'Error:' . $ex );
            }
            finally
            {
                //
                $this->getConnector()->disconnect();
            }
        }

    }

?>