<?php 
    require_once 'bootstrap.php'; 
    require_once 'router.php'; 

    $router = new Router();

    $router->appendRoutes( new Route( 'homepage', 'views/index.php' ) );
    $router->appendRoutes( new Route( 'setup', 'views/setup.php' ) );
    
    $router->appendRoutes( new Route( 'product', 'views/product.php' ) );
    $router->appendRoutes( new Route( 'checkout', 'views/checkout.php' ) );
    
    $router->appendRoutes( new Route( 'about', 'views/about.php' ) );
    $router->appendRoutes( new Route( 'contact', 'views/contact.php' ) );

    $router->appendRoutes( new Route( 'profile', 'views/profile.php' ) );

    // 
    $special_404 = new Route( '404', 'views/404.php' );
    $router->setSpecialPage404( $special_404 );
    $router->appendRoutes( $special_404 );

    //
    $router->load_view();
?>