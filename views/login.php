<?php
    /**
     *  Title: Login
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */
    $access = new AccessPrivilegesDomain();

    if( $access->is_logged_in() )
    {
        redirect_to_local_page( 'homepage' );
    }

    $domain = new AuthDomain();

    if( LoginDomainView::validateIsSubmitted() )
    {
        $profile = $domain->login();

        if( !is_null( $profile ) )
        {
            $args_session = array( 'person_data_profile'=>$profile );
            $session = new UserSession( $args_session );

            UserSessionDataView::setInstance($session);
            UserSessionDataView::getInstance();

        }
    }


    // Makes sure when the user press login, that it is intentionally, also forces the user to
    // relogin, if it's a refresh
    $fss = new FormSpoofSecurity();

    $fss->generate();
    $fss->applyToSession();

    
    PageTitleController::getSingletonController()->append( ' - Login' );
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <?php echo encodingStandardHTML(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <?php
            PageTitleView::getSingletonView()->printHTML()
        ?>
    </head>
    <body>
        <?php getHeader(); ?>

        <main>
            <h2>
                Login
            </h2>

            <div id="login_form_boundary"> 
                
                <form action="./login" 
                      method="post" 
                      onsubmit="validate_login();"
                      id="">

                    <input type="hidden" 
                           name="security_token"
                           <?php FormSpoofSecurity::printSessionFSSToken(); ?> >

                    <div> 
                        <input type="text" 
                               id="form_login_username_id" 
                               name="form_login_username">
                        <label> Username </label>

                        <input type="password" 
                               id="form_login_password_id" 
                               name="form_login_password">
                        <label> Password </label>
                    </div>
                    
                    <div> 
                        <input class="btn" 
                               type="submit" 
                               value="Login" 
                               name="form_login_submit">
                    </div>

                    <div class="split"> 
                        <a href="./register"> Register new account </a>
                        <a href="./forgot-my-password"> Forgot my password </a>
                    </div>

                    <script src="./assets/javascript/login-validate-form.js" 
                            type="application/javascript">      
                </script>
                </form>
            </div>
        </main>

        <?php getFooter(); ?>
    </body>
</html>