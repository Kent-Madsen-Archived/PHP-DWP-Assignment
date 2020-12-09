<?php
    /**
     *  Title: Setup
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    PageTitleController::getSingletonController()->append( ' - Setup' );

    const sql_base = 'assets/sql/installation_script.sql';
    const sql_tables = 'assets/sql/1_setup_tables.sql';
    const sql_references = 'assets/sql/2_setup_references.sql';
    const sql_data = 'assets/sql/3_setup_data.sql';
    const sql_functions = 'assets/sql/4_setup_functions.sql';
    const sql_triggers = 'assets/sql/5_setup_triggers.sql';
    const sql_views = 'assets/sql/6_setup_views.sql';


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

            return self::$setup;
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
    $value = $router->getCurrentRoute()->getValidationTree()[1]->getValue();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo encodingStandardHTML(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet"
              href="/assets/css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        
        <?php
                PageTitleView::getSingletonView()->printHTML();
        ?>
    </head>
    <body>
        <?php getHeader(); ?>

        <main>
            <h2>
                Setup
            </h2>

            <?php
                if( isset( $value ) )
                {
                    if( $value == 'status' )
                    {
                        include 'views/setup/status.php';
                    }
                }
            ?>
        </main>
        
        <?php getFooter(); ?>
    </body>
</html>