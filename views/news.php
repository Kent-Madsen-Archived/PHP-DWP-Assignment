<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    $title = PageTitleSingleton::getInstance();
    $title->appendToTitle( ' - News' );
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/style.css">
        
        <?php 
            $title->printDocumentTitle();
        ?>
    </head>
    <body>
        <?php get_header(); ?>
        
        <main>
            <?php 
                $access = new NetworkAccess( 'localhost', 3600 );   
                $user_credential = new UserCredential( 'development', 'Epc63gez' );
                $database = "dwp_assignment";

                $information = new MySQLInformation( $access, $user_credential, $database );

                $factory = new PersonAddressFactory( new MySQLConnector( $information ) );
                
                $model = new PersonAddressModel( $factory );
                $model->setIdentity(41);
                $model->setStreetName('Stengårdsvej');
                $model->setStreetAddressNumber(80);
                $model->setZipCode('6705');
                $model->setCountry('Danmark');

                $factory->delete($model);
                
                
            ?>

        </main>
        
        <?php get_footer(); ?>
    </body>
</html>