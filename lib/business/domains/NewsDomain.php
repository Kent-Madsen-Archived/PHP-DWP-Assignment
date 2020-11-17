<?php 
    /**
     *  title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * Class NewsDomain
     */
    class NewsDomain 
        extends Domain
    {
        /**
         * NewsDomain constructor.
         * @throws Exception
         */
        public function __construct()
        {
            $access = new NetworkAccess( WEBPAGE_DATABASE_HOSTNAME, WEBPAGE_DATABASE_PORT );   
            $user_credential = new UserCredential( WEBPAGE_DATABASE_USERNAME, WEBPAGE_DATABASE_PASSWORD );

            $database = WEBPAGE_DATABASE_NAME;

            $this->setInformation( new MySQLInformation( $access, $user_credential, $database ) );
        }


        /**
         * @return array
         * @throws Exception
         */
        final public function lastest_news()
        {
            $factory = new ArticleFactory( new MySQLConnectorWrapper( $this->getInformation() ) );
            var_dump($factory->length());

            $factory->setLimit(6);

            return $factory->read_ordered_by_creation_date();
        }


        /**
         * @return array
         * @throws Exception
         */
        final public function frontpage_news()
        {
            $factory = new ArticleFactory( new MySQLConnectorWrapper( $this->getInformation() ) );

            $factory->setLimit(3);

            return $factory->read_ordered_by_creation_date();
        }


        /**
         * @param $idx
         * @throws Exception
         */
        final public function getArticle( $idx )
        {
            $factory = new ArticleFactory( new MySQLConnectorWrapper( $this->getInformation() ) );
            $model = new ArticleModel( $factory );
            $model->setIdentity( $idx );

            

        }
    }

?>