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
        function __construct( $mysql_connector )
        {
            $this->setConnector( $mysql_connector );
        }

        // Variables
        private $pagination_index = 0;
        private $limit = 5;

        /**
         * 
         */
        public function get()
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $retVal = array();
            $sql = "select * from article limit ? offset ?;";

            try 
            {
                $stmt = $connection->prepare( $sql );

                $stmt->bind_param( "ii", 
                                   $stmt_limit, 
                                   $stmt_offset );

                $stmt_limit = $this->getLimit();
                $stmt_offset = $this->getLimit() * $this->getPaginationIndex();

                $stmt->execute();
                $result = $stmt->get_result();

                if( $result->num_rows > 0 )
                {
                    while( $row = $result->fetch_assoc() )
                    {
                        $articleModel = new ArticleModel( $this );
                        
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
        public function create( $model )
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            $retVal = null;

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "insert into article( title, article_content ) VALUES( ?, ? )";

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
        public function update( $model )
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "update article set title = ?, article_content = ? where identity = ?";

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
        public function delete( $model )
        {
            $this->getConnector()->connect();

            $connection = $this->getConnector()->getConnector();

            if( $connection->connect_error )
            {
                throw new Exception( 'Error: ' . $connection->connect_error );
            }

            $sql = "delete from article where identity = ?;";

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

        // Accessors
            // Getters
        /**
         * 
         */
        public function getPaginationIndex()
        {
            return $this->pagination_index;
        }

        /**
         * 
         */
        public function getLimit()
        {
            return $this->limit;
        }

            // Setters
        /**
         * 
         */
        public function setPaginationIndex( $idx )
        {
            $this->pagination_index = $idx;
        }

        /**
         * 
         */
        public function setLimit( $var )
        {
            $this->limit = $var;
        }


    }

?>