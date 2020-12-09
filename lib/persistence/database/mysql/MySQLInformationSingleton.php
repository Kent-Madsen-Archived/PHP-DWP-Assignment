<?php

    class MySQLInformationSingleton
    {
        public function __construct()
        {

        }

        private static $singleton = null;


        /**
         * @return null
         * @throws Exception
         */
        final public static function getSingleton()
        {
            if( is_null( self::$singleton ) )
            {
                $access = new NetworkAccess( WEBPAGE_DATABASE_HOSTNAME, WEBPAGE_DATABASE_PORT );
                $user_credential = new UserCredential( WEBPAGE_DATABASE_USERNAME, WEBPAGE_DATABASE_PASSWORD );
                $database = WEBPAGE_DATABASE_NAME;

                self::setSingleton(new MySQLInformation( $access, $user_credential, $database ));
            }

            return self::$singleton;
        }


        /**
         * @param null $singleton
         */
        final public static function setSingleton( $singleton ): void
        {
            self::$singleton = $singleton;
        }
    }

?>