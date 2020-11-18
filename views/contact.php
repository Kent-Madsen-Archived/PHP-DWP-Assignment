<?php
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */
    if( ContactDomainFormView::validateIsSubmitted() )
    {
        $comparedFSSToken = false;

        if( ContactDomainFormView::validateFSSTokenExist() )
        {
            $comparedFSSToken = ContactDomainFormView::validateSecurityFSS();
        }

        $recaptcha_v2 = ContactDomainFormView::validateSecurityCaptcha();

        $spoof = ContactDomainFormView::validateSecuritySpoof();

        $domain = new ContactDomainForm();
        $domain->makeReadyForSending();
    }

    // Makes sure when the user press login, that it is intentionally, also forces the user to
    // relogin, if it's a refresh
    $fss = new FormSpoofSecurity();
    $fss->apply_to_session();

    PageTitleController::getSingletonController()->append( ' - Contact' );
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/style.css">

        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
            
        <?php
            PageTitleView::getSingletonView()->printHTML();
        ?>
    </head>

    <body>
        <?php get_header(); ?>

        <main> 
            <div id="contact_form_boundary"> 

                <form method="post" 
                      action="./contact" 
                      onsubmit="validate_contact();">

                    <h3> Contact us </h3>

                    <input type="hidden" 
                           name="security_token" 
                           value="<?php echo $_SESSION['fss_token']; ?>" >

                    <input type="hidden" 
                           name="security_empty" 
                           value="">

                    <input type="text" 
                           placeholder="E-mail"
                           name="form_contact_from"
                           id="form_contact_from_id">
                           
                    <label> From </label>

                    <div> 
                        <input type="text" 
                               placeholder="Subject"
                               name="form_contact_subject"
                               id="form_contact_subject_id">

                        <label> Subject </label>
                        
                        <input type="text" 
                               placeholder="Message"
                               name="form_contact_message"
                               id="form_contact_message_id">

                        <label> Message </label>
                    </div>
                    
                    <div class="g-recaptcha" 
                         data-sitekey="<?php ReCaptchaV2::PrintPublicKey(); ?>">
                    </div>

                    <div> 
                        <input class="button" 
                               type="submit" 
                               value="send" 
                               name="form_contact_submit">
                    </div>
                    
                    <script src="./assets/javascript/contact-validate-form.js" 
                            type="application/javascript">      
                    </script>
                </form>
            </div>
        </main>

        <?php get_footer(); ?>
    </body>
</html>