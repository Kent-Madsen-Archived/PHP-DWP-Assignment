<?php
    /**
     *  Title: Contact
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    if( ContactForm::validateIsSubmitted() )
    {
        $domain = new ContactDomain();
        $domain->makeReadyForSending();
    }

    // Makes sure when the user press login, that it is intentionally, also forces the user to
    // relogin, if it's a refresh
    $fss = new FormSpoofSecurity();

    $fss->generate();
    $fss->applyToSession();

    PageTitleController::getSingletonController()->append( ' - contact' );
?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <?php echo encodingStandardHTML(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
            
        <?php
            PageTitleView::getSingletonView()->printHTML();
        ?>
    </head>

    <body>
        <?php getHeader(); ?>

        <main>
            <h3>
                Contact
            </h3>

            <div id="contact_form_boundary"> 

                <form method="post" 
                      action="./contact" 
                      onsubmit="validate_contact();">

                    <h3> Contact us </h3>

                    <input type="hidden"
                           name="security_token"
                           <?php $fss::printSessionFSSToken(); ?> >

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

        <?php getFooter(); ?>
    </body>
</html>