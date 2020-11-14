<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    class NewsDomain 
        extends Domain
    {
        public function __construct()
        {
            $access = new NetworkAccess( WEBPAGE_DATABASE_HOSTNAME, WEBPAGE_DATABASE_PORT );   
            $user_credential = new UserCredential( WEBPAGE_DATABASE_USERNAME, WEBPAGE_DATABASE_PASSWORD );

            $database = WEBPAGE_DATABASE_NAME;

            $this->setInformation( new MySQLInformation( $access, $user_credential, $database ) );
        }


        public function lastest_news()
        {
            $factory = new ArticleFactory( new MySQLConnector( $this->getInformation() ) );
            var_dump($factory->length());

            $factory->setLimit(6);

            return $factory->read_ordered_by_creation_date();
        }

        
        public function frontpage_news()
        {
            $factory = new ArticleFactory( new MySQLConnector( $this->getInformation() ) );

            $factory->setLimit(3);

            return $factory->read_ordered_by_creation_date();
        }


        public function getArticle( $idx )
        {
            $factory = new ArticleFactory( new MySQLConnector( $this->getInformation() ) );
            $model = new ArticleModel( $factory );
            $model->setIdentity( $idx );

            

        }
    }

?>