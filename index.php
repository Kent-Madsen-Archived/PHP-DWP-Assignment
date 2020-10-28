<?php 
    /**
     * 
     */
    session_start();
?>

<?php 
    // Internal Libraries
    require_once 'bootstrap.php'; 
    require_once 'router.php'; 

    // Variables
    $router = new Router();

    // Adds predfined routes, to the router.
    $router->appendRoutes( new Route( 'homepage', 'views/index.php' ) );
    $router->appendRoutes( new Route( 'setup', 'views/setup.php' ) );
    
    $router->appendRoutes( new Route( 'product', 'views/product.php' ) );
    $router->appendRoutes( new Route( 'checkout', 'views/checkout.php' ) );
    
    $router->appendRoutes( new Route( 'about', 'views/about.php' ) );
    $router->appendRoutes( new Route( 'contact', 'views/contact.php' ) );

    $router->appendRoutes( new Route( 'profile', 'views/profile.php' ) );

    // Special Routes, like page 404.
    $special_404 = new Route( '404', 'views/404.php' );
    $router->setSpecialPage404( $special_404 );
    $router->appendRoutes( $special_404 );


    // Load current page or domain
    $router->load_view();
?>