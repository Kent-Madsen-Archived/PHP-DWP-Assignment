<?php
    /**
     *  Title: Register
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    $access = new AccessPrivilegesDomain();

    if( $access->is_logged_in() )
    {
        redirect_to_local_page( 'homepage' );
    }

    //
    $domain = new AuthDomain();
    $new_user = $domain->register();

    if( !is_null( $new_user ) )
    {
        $args_session = array( 'person_data_profile'=>$new_user );
        $session = new UserSession( $args_session );
        UserSessionSingleton::setInstance( $session );

        redirect_to_local_page('profile');
    }

    /**
     * 
     */
    // Makes sure when the user press login, that it is intentionally, also forces the user to
    // relogin, if it's a refresh
    $fss = new FormSpoofSecurity();

    $fss->generate();
    $fss->applyToSession();

    PageTitleController::getSingletonController()->append( ' - Register' );
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
                Register
            </h3>

              <div id="register_form_boundary"> 
                     <form action="./register" 
                            method="post" 
                            onsubmit="validate_register();"
                            id="register_form">
                            
                            <input type="hidden" 
                                   name="security_token"
                                   <?php FormSpoofSecurity::printSessionFSSToken(); ?> >

                            <input type="hidden" 
                                   name="security_empty" 
                                   value="">

                            <h4> Register new account </h4>
                            
                            <section class="section">
                                   <h5> User credentials </h5>

                                   <input type="text" 
                                          name="form_register_username" 
                                          placeholder="Username" 
                                          id="form_register_username_id">

                                   <label> Username </label>

                                   <input type="password" 
                                          name="form_register_password" 
                                          placeholder="Password"
                                          id="form_register_password_id">

                                   <label> Password </label>

                                   <input type="password" 
                                          name="form_register_password_again" 
                                          placeholder="Password"
                                          id="form_register_password_again_id">

                                   <label> Password Again </label>
                            </section>

                            <section class="section">
                                   <h5> Name </h5>

                                   <input type="text" 
                                          name="form_register_firstname" 
                                          placeholder="Firstname",
                                          id="form_register_firstname_id">

                                   <label> Firstname </label>
                                   
                                   <input type="text" 
                                          name="form_register_lastname" 
                                          placeholder="Lastname"
                                          id="form_register_lastname_id">
                                   
                                   <label> Lastname </label>

                                   <input type="text" 
                                          name="form_register_middlename" 
                                          placeholder="Middle name"
                                          id="form_register_middlename_id">
                                   
                                   <label> Middle name </label>
                            </section>

                            <section class="section">
                                   <h5> Personal Information </h5>

                                   <input type="email" 
                                          name="form_register_email" 
                                          placeholder="E-mail"
                                          id="form_register_email_id">

                                   <label> E-mail </label>

                                   <input type="date" 
                                          name="form_register_birthday" 
                                          placeholder="Birthday"
                                          id="form_register_birthday_id">
                                   
                                   <label> Birthday </label>
                                   
                                   <input type="text" 
                                          name="form_register_phone_number" 
                                          placeholder="Phone number"
                                          id="form_register_phone_number_id">
                                   
                                   <label> Phone number </label>
                            </section>

                            <section class="section">
                                    <div class="row">
                                      <h5> Address </h5>
                                      <div class="col m10">
                                          <input type="text"
                                                 name="form_register_street_name"
                                                 placeholder="Street name"
                                                 id="form_register_street_name_id">

                                          <label> Street Address name </label>
                                      </div>
                                       <div class="col m2">
                                           <input type="number"
                                                  name="form_register_street_address_number"
                                                  placeholder="Number"
                                                  id="form_register_street_address_number_id"
                                                  value="0">

                                           <label> Street Address number </label>
                                       </div>
                                        <div class="col m12">
                                            <input type="text"
                                                   name="form_register_street_floor"
                                                   placeholder="floor"
                                                   id="form_register_street_floor_id">

                                            <label> Floor </label>
                                        </div>
                                    </div>

                                <div class="row">
                                    <div class="col m4">
                                        <input type="text"
                                               name="form_register_city"
                                               placeholder="City"
                                               id="form_register_city">

                                        <label> City </label>
                                    </div>

                                    <div class="col m4">
                                        <input type="number"
                                               name="form_register_street_zip_code"
                                               placeholder="Zip code"
                                               id="form_register_street_zip_code_id">

                                        <label> Zip code </label>
                                    </div>

                                    <div class="col l4">
                                        <input type="text"
                                               name="form_register_country"
                                               placeholder="Country"
                                               id="form_register_country_id">

                                        <label> Country </label>
                                    </div>
                                </div>
                            </section>

                            <div class="section">
                                <div class="g-recaptcha"
                                     data-sitekey="<?php ReCaptchaV2::PrintPublicKey(); ?>">
                                </div>
                            </div>

                            <div class="section view">
                                   <input type="submit" 
                                          value="send" 
                                          class="button"
                                          name="form_register_submit">
                            </div>

                            <script src="./assets/javascript/register-validate-form.js" 
                                   type="application/javascript">      
                            </script>
                     </form>
              </div>
        </main>

        <?php getFooter(); ?>
    </body>
</html>