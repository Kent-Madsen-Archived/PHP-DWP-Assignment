<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
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
    require 'bootstrap.php'; 
    require 'router_singleton.php'; 

    $session_fixation = new SessionFixationSecurity();
    $session_fixation->update();


    // Variables
    $router = new Router();
    RouterSingleton::setInstance( $router );

    // Adds predfined routes, to the router.
    $setup_route = new Route( 'setup', 'views/setup.php' );
    $router->appendRoutes( $setup_route );

    $homepage = new Route( 'homepage', 'views/index.php' );
    $router->appendRoutes( $homepage );

    $product = new Route( 'product', 'views/product.php');
    $router->appendRoutes( $product );

    $shop = new Route( 'shop', 'views/shop.php' );
    $router->appendRoutes( $shop );

    $checkout = new Route( 'checkout', 'views/checkout.php' );
    $router->appendRoutes( $checkout );

    $about = new Route( 'about', 'views/about.php' );
    $router->appendRoutes( $about );

    $contact = new Route( 'contact', 'views/contact.php' ) ;
    $router->appendRoutes( $contact );

    $profile = new Route( 'profile', 'views/profile.php' ) ;
    $router->appendRoutes( $profile );

    $login = new Route( 'login', 'views/login.php' );
    $router->appendRoutes( $login );

    $logout = new Route( 'logout', 'views/logout.php' );
    $router->appendRoutes( $logout );

    $register = new Route( 'register', 'views/register.php' );
    $router->appendRoutes( $register );

    $forgot_my_password = new Route( 'forgot-my-password', 'views/forgot_password.php' );
    $router->appendRoutes( $forgot_my_password );

    $news = new Route( 'news', 'views/news.php' ) ;
    $router->appendRoutes( $news );

    $invoice = new Route( 'invoice', 'views/invoices.php' );
    $router->appendRoutes( $invoice );

    $admin = new Route( 'admin', 'views/admin.php' );
    $router->appendRoutes( $admin );
    
    // Special Routes, like page 404.
    $special_404 = new Route( '404', 'views/404.php' );
    
    $router->setSpecialPage404( $special_404 );
    $router->appendRoutes( $special_404 );

    //
    RouterSingleton::getInstance()->load_view();
?>