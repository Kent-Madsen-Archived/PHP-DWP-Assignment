<?php
    /**
     *  Title: Setup
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    PageTitleController::getSingletonController()->append( ' - Setup' );
?>
<?php

    /**
     * Class SetupView
     */
    class SetupView
    {
        /**
         * @return mixed
         * @throws Exception
         */
        public static function getView(): SetupInstallation
        {
            if( is_null( self::$setup ) )
            {
                self::setSetup( new SetupInstallation( new MySQLConnectorWrapper( MySQLInformationSingleton::getSingleton() ) ) );
            }

            return self::setup;
        }

        /**
         * @param $setup
         * @return SetupInstallation
         * @throws Exception
         */
        public static function setSetup( $setup ): SetupInstallation
        {
            self::$setup = $setup;
            return self::getView();
        }

        //
        private static $setup = null;
    }

    $router = RouterSingleton::getInstance();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet"
              href="/assets/css/style.css">
        
        <?php
                PageTitleView::getSingletonView()->printHTML();
        ?>
    </head>
    <body>
        <?php getHeader(); ?>

        <main>
            <?php

            ?>
        </main>
        
        <?php getFooter(); ?>
    </body>
</html>