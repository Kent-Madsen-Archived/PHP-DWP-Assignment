<?php

abstract class GroupContact
{
    private static $mysqlWrapper = null;
    private static $contactFactory = null;

    /**
     * @return null
     * @throws Exception
     */
    public static final function getMysqlWrapper()
    {
        if( is_null( self::$mysqlWrapper ) )
        {
            self::setMysqlWrapper( new MySQLConnectorWrapper( MySQLInformationSingleton::getSingleton() ) );
        }

        return self::$mysqlWrapper;
    }


    /**
     * @param MySQLConnectorWrapper|null $mysqlWrapper
     */
    public static final function setMysqlWrapper( ?MySQLConnectorWrapper $mysqlWrapper ): void
    {
        self::$mysqlWrapper = $mysqlWrapper;
    }


    /**
     * @return ContactFactory|null
     * @throws Exception
     */
    public final static function getContactFactory(): ?ContactFactory
    {
        if( is_null( self::$contactFactory ) )
        {
            self::setContactFactory( new ContactFactory( self::getMysqlWrapper() ) );
        }

        return self::$contactFactory;
    }


    /**
     * @param ContactFactory|null $contactFactory
     */
    public final static function setContactFactory( ?ContactFactory $contactFactory ): void
    {
        self::$contactFactory = $contactFactory;
    }
}

?>