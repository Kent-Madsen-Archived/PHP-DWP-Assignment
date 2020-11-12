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

                $factory = new ProductFactory( new MySQLConnector( $information ) );

                $model = new ProductModel( $factory );

                $model->setIdentity(2);

                $model->setTitle('abc');
                $model->setDescription('der');
                $model->setPrice(200);

                $factory->update( $model );

            ?>

        </main>
        
        <?php get_footer(); ?>
    </body>
</html>