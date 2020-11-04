<?php 
    /**
     * 
     */

    // Set's it so, that sessions can only be used by cookies and disallows it in the url.
    // It removes URL based attacks 
    ini_set( 'session.use_only_cookies', true );

    // Setup session if it's not called by default
    // in php.ini set session.auto_start to 1
    session_start();
?>

<?php 
    // Internal Libraries
    require_once 'bootstrap.php'; 
    require_once 'router.php'; 

    // Variables
    $router = new Router();

    // Adds predfined routes, to the router.
    $router->appendRoutes( new Route( 'setup', 'views/setup.php' ) );
    
    $router->appendRoutes( new Route( 'homepage', 'views/index.php' ) );
    
    $router->appendRoutes( new Route( 'product', 'views/product.php' ) );
    $router->appendRoutes( new Route( 'checkout', 'views/checkout.php' ) );
    $router->appendRoutes( new Route( 'shop', 'views/shop.php' ) );
    
    $router->appendRoutes( new Route( 'about', 'views/about.php' ) );
    $router->appendRoutes( new Route( 'contact', 'views/contact.php' ) );

    $router->appendRoutes( new Route( 'profile', 'views/profile.php' ) );

    $router->appendRoutes( new Route( 'login', 'views/login.php' ) );
    $router->appendRoutes( new Route( 'logout', 'views/logout.php' ) );
    $router->appendRoutes( new Route( 'register', 'views/register.php' ) );

    // Special Routes, like page 404.
    $special_404 = new Route( '404', 'views/404.php' );
    
    $router->setSpecialPage404( $special_404 );
    $router->appendRoutes( $special_404 );

    // Load current page or domain
    $router->load_view();

?>