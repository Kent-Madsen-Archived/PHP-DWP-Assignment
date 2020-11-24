<?php
    /**
     *  Title: Index
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, Page
     *  Project: DWP-Assignment
     */

    header('Content-Type: text/html; charset=UTF-8');

    // Set's it so, that sessions can only be used by cookies and disallows it in the url.
    // It removes URL based attacks 
    ini_set( 'session.use_only_cookies', true );

    // Setup session if it's not called by default
    // in php.ini set session.auto_start to 1
    session_start();
?>
<?php 
    // Internal Libraries
    require 'inc/bootstrap.php';

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

    $router->appendToRoutes( $setup_route );


    $homepage = new Route( 'homepage', 'views/index.php' );
    $homepage->appendValidationObject( $router_validate_root );
    $router->appendToRoutes( $homepage );


    $product = new Route( 'product', 'views/product.php');
    $product->appendValidationObject( $router_validate_root );
    $router->appendToRoutes( $product );


    $shop = new Route( 'shop', 'views/shop.php' );
    $shop->appendValidationObject( $router_validate_root );
    $router->appendToRoutes( $shop );


    $checkout = new Route( 'checkout', 'views/checkout.php' );
    $checkout->appendValidationObject( $router_validate_root );
    $router->appendToRoutes( $checkout );


    $about = new Route( 'about', 'views/about.php' );
    $about->appendValidationObject( $router_validate_root );
    $router->appendToRoutes( $about );


    $contact = new Route( 'contact', 'views/contact.php' ) ;
    $contact->appendValidationObject( $router_validate_root );
    $router->appendToRoutes( $contact );


    $profile = new Route( 'profile', 'views/profile.php' );
    $profile->appendValidationObject( $router_validate_root );
    $router->appendToRoutes( $profile );


    $login = new Route( 'login', 'views/login.php' );
    $login->appendValidationObject( $router_validate_root );
    $router->appendToRoutes( $login );


    $logout = new Route( 'logout', 'views/logout.php' );
    $logout->appendValidationObject( $router_validate_root );
    $router->appendToRoutes( $logout );


    $register = new Route( 'register', 'views/register.php' );
    $register->appendValidationObject( $router_validate_root );
    $router->appendToRoutes( $register );


    $forgot_my_password = new Route( 'forgot-my-password', 'views/forgot_password.php' );
    $forgot_my_password->appendValidationObject( $router_validate_root );
    $router->appendToRoutes( $forgot_my_password );


    $news = new Route( 'news', 'views/news.php' ) ;
    $news->appendValidationObject( $router_validate_root );
    $router->appendToRoutes( $news );



    $invoice = new Route( 'invoice', 'views/invoices.php' );
    $invoice->appendValidationObject( $router_validate_root );
    $router->appendToRoutes( $invoice );



    $admin = new Route( 'admin', 'views/admin.php' );
    $admin->appendValidationObject( $router_validate_root );
    $router->appendToRoutes( $admin );



    // Special Routes, like page 404.
    $special_404 = new Route( '404', 'views/404.php' );
    
    $router->setSpecialPage404( $special_404 );
    $router->appendToRoutes( $special_404 );

    //
    RouterSingleton::getInstance()->loadView();


    //
    $route = $router->getCurrentRoute();
    debug_var( $route );
?>