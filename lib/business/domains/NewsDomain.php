<?php
    /**
     *  Title: NewsDomain
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Class
     *  Project: DWP-Assignment
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
            $this->setInformation( MySQLInformationSingleton::getSingleton() );
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

            return $factory->readOrderedByCreationDate();
        }


        /**
         * @return array
         * @throws Exception
         */
        final public function frontpage_news()
        {
            $factory = new ArticleFactory( new MySQLConnectorWrapper( $this->getInformation() ) );

            $factory->setLimit(3);

            return $factory->readOrderedByCreationDate();
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