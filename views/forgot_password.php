<?php
    require 'forms/forgot_my_password_process.php';
    require 'forms/forgot_my_password_validation.php';

    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */

    /**
     * 
     */
    $title = PageTitleSingleton::getInstance();
    $title->appendToTitle( ' - Forgot my password' );
?>
<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/style.css">

        <?php 
            $title->printDocumentTitle();

            // Makes sure when the user press login, that it is intentionally, also forces the user to
            // relogin, if it's a refresh
            $fss = new FormSpoofSecurity();
            $fss->apply_to_session();
        ?>
    </head>
    <body>
        <?php get_header(); ?>

        <main> 
            <div id="forgot_form_boundary"> 
                <form method="post" 
                      action="./forgot-my-password" 
                      onsubmit="validate_forgot();"> 
                    
                    <h3>Forgot my password</h3>
                    
                    <div>
                        <input type="hidden" 
                               name="security_token" 
                               value="<?php echo $_SESSION['fss_token']; ?>" >
                        
                        <input type="email" 
                               placeholder="E-mail"
                               id="forgot_form_email_id"
                               name="forgot_form_email" >
                        


                        <label> E-mail to your account </label>
                    </div>
                
                    <div> 
                        <input class="btn" type="submit" value="send" name="submit_forgot_form">
                    </div>
                    
                    <script src="./assets/javascript/forgot-validate-form.js" 
                                   type="application/javascript">      
                    </script>
                </form>
            </div>
        </main>

        <?php get_footer(); ?>
    </body>
</html>