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

    $domain = new NewsDomain();
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

        <?php 
            $arr = $domain->lastest_news();
            $access = new NetworkAccess( WEBPAGE_DATABASE_HOSTNAME, WEBPAGE_DATABASE_PORT );   
            $user_credential = new UserCredential( WEBPAGE_DATABASE_USERNAME, WEBPAGE_DATABASE_PASSWORD );

            $database = 'test';
        ?>

        <main>
            <div class="row">
                <?php 
                    foreach( $arr as $value ):
                ?>
                    <div class="col s8 m5">
                        <div class="card">
                            <div class="card-image"> 
                                <img src=""/>
                            </div>

                            <div class="card-content"> 
                                <p class="card-title"> <?php echo $value->getTitle(); ?> </p>
                                <p> <?php echo $value->getContent(); ?></p>
                                
                                <div class="row"> 
                                    <p class="col"> <?php echo $value->getCreatedOn(); ?> </p>
                                    <p class="col"> <?php echo $value->getLastUpdated(); ?> </p>
                                </div>
                            </div>
                            
                            <div class="card-action">
                                <a href="<?php echo "./news/" . $value->getIdentity(); ?>"> Read More </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </main>
        
        <?php get_footer(); ?>
    </body>
</html>