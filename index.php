<?php
    header('Content-Type: text/html; charset=UTF-8');

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

    //
    $session_fixation = new SessionFixationSecurity();
    $session_fixation->update();

    // Variables
    $router = new Router();
    RouterSingleton::setInstance( $router );

    // Setup
    // Adds predfined routes, to the router.
    $setup_route = new Route( 'setup', 'views/setup.php' );

    $router_validate_root = new RouterValidateStringArgument();
    $router_validate_root->setLevel(0 );

    $router_validate_setup_view = new RouterValidateStringArgument();
    $router_validate_setup_view->setLevel(1 );

    $setup_route->appendValidationObject( $router_validate_root );
    $setup_route->appendValidationObject( $router_validate_setup_view );

    $router->appendRoutes( $setup_route );



    $homepage = new Route( 'homepage', 'views/index.php' );
    $router->appendRoutes( $homepage );
    $homepage->appendValidationObject( $router_validate_root );




    $product = new Route( 'product', 'views/product.php');
    $router->appendRoutes( $product );
    $product->appendValidationObject( $router_validate_root );



    $shop = new Route( 'shop', 'views/shop.php' );
    $router->appendRoutes( $shop );
    $shop->appendValidationObject( $router_validate_root );



    $checkout = new Route( 'checkout', 'views/checkout.php' );
    $router->appendRoutes( $checkout );
    $checkout->appendValidationObject( $router_validate_root );



    $about = new Route( 'about', 'views/about.php' );
    $router->appendRoutes( $about );
    $about->appendValidationObject( $router_validate_root );



    $contact = new Route( 'contact', 'views/contact.php' ) ;
    $router->appendRoutes( $contact );
    $contact->appendValidationObject( $router_validate_root );



    $profile = new Route( 'profile', 'views/profile.php' ) ;
    $router->appendRoutes( $profile );
    $profile->appendValidationObject( $router_validate_root );



    $login = new Route( 'login', 'views/login.php' );
    $router->appendRoutes( $login );
    $login->appendValidationObject( $router_validate_root );



    $logout = new Route( 'logout', 'views/logout.php' );
    $router->appendRoutes( $logout );
    $logout->appendValidationObject( $router_validate_root );



    $register = new Route( 'register', 'views/register.php' );
    $router->appendRoutes( $register );
    $register->appendValidationObject( $router_validate_root );



    $forgot_my_password = new Route( 'forgot-my-password', 'views/forgot_password.php' );
    $router->appendRoutes( $forgot_my_password );
    $forgot_my_password->appendValidationObject( $router_validate_root );



    $news = new Route( 'news', 'views/news.php' ) ;
    $router->appendRoutes( $news );
    $news->appendValidationObject( $router_validate_root );



    $invoice = new Route( 'invoice', 'views/invoices.php' );
    $router->appendRoutes( $invoice );
    $invoice->appendValidationObject( $router_validate_root );



    $admin = new Route( 'admin', 'views/admin.php' );
    $router->appendRoutes( $admin );
    $admin->appendValidationObject( $router_validate_root );



    // Special Routes, like page 404.
    $special_404 = new Route( '404', 'views/404.php' );
    
    $router->setSpecialPage404( $special_404 );
    $router->appendRoutes( $special_404 );

    //
    RouterSingleton::getInstance()->load_view();
?>