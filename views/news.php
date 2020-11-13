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
                
                $connection = new MySQLConnector($information);

                $factory = new ArticleFactory( $connection );
                var_dump(array($factory->exist_database(), "Table: article state"));

                $factory = new AssociatedCategoryFactory( $connection );
                var_dump(array($factory->exist_database(), "Table: associated category state"));

                $factory = new BroughtFactory($connection);
                var_dump(array($factory->exist_database(), "Table: Brought state"));

                $factory = new ContactFactory($connection);
                var_dump(array($factory->exist_database(), "Table: Contact state"));

                $factory = new ImageFactory( $connection );
                var_dump(array($factory->exist_database(), "Table: Image state"));

                $factory = new ImageTypeFactory($connection);
                var_dump(array($factory->exist_database(), "Table: Image Type state"));

                $factory = new PageElementFactory($connection);
                var_dump(array($factory->exist_database(), "Table: Page Element State"));

                $factory = new PersonAddressFactory($connection);
                var_dump(array($factory->exist_database(), "Table: Person Address state"));

                $factory = new PersonNameFactory($connection);
                var_dump(array($factory->exist_database(), "Table: Person Name state"));

                $factory = new ProductAttributeFactory($connection);
                var_dump(array($factory->exist_database(), "Table: product attribute state"));

                $factory = new ProductCategoryFactory( $connection );
                var_dump(array($factory->exist_database(), "Table: product category state"));

                $factory = new ProductEntityFactory($connection);
                var_dump(array($factory->exist_database(), "Table: product entity state"));

                $factory = new ProductFactory($connection);
                var_dump(array($factory->exist_database(), "Table: product state"));

                $factory = new ProductInvoiceFactory($connection);
                var_dump(array($factory->exist_database(), "Table: product invoice"));

                $factory = new ProductUsedImageFactory($connection);
                var_dump(array($factory->exist_database(), "Table: product used image state"));

                $factory = new ProductUsedImageFactory($connection);
                var_dump(array($factory->exist_database(), "Table: product used image state"));

                $factory = new ProfileFactory($connection);
                var_dump(array($factory->exist_database(), "Table: profile state"));

                $factory = new ProfileInformationFactory($connection);
                var_dump(array($factory->exist_database(), "Table: profile information state"));

                $factory = new ProfileTypeFactory($connection);
                var_dump(array($factory->exist_database(), "Table: profile type"));


            ?>

        </main>
        
        <?php get_footer(); ?>
    </body>
</html>