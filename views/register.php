<?php 
    /**
     *  Title:
     *  Author:
     *  Type: PHP Script
     */
    require_once 'forms/register_validation.php';
    require_once 'forms/register_process_form.php';
    
    /**
     * 
     */
    $title = PageTitleSingleton::getInstance();
    $title->appendToTitle( ' - Register' );
?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="/assets/css/style.css">
        
        <?php 
            $title->printDocumentTitle();
        ?>
    </head>
    <body>
        <?php get_header(); ?>

        <main> 
            <form action="./register" 
                  method="post" 
                  onsubmit="validate_register();"
                  id="register_form">

                <h4> User credentials </h4>
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

                
                <h4> Name </h4>
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

                <h4> Personal Information </h4>
                <input type="text" 
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



                <h4> Address </h4>
                <input type="text" 
                       name="form_register_country" 
                       placeholder="Country"
                       id="form_register_country_id">
                <label> Country </label>

                <input type="text" 
                       name="form_register_street_name" 
                       placeholder="Street name"
                       id="form_register_street_name_id">
                <label> Street name </label>
                
                <input type="number" 
                       name="form_register_street_address_number" 
                       placeholder="Number"
                       id="form_register_street_address_number_id"
                       value="0">
                <label> Street address number </label>

                <input type="number" 
                       name="form_register_street_zip_code" 
                       placeholder="Zip code"
                       id="form_register_street_zip_code_id">
                <label> Zip code </label>


                <input type="submit" 
                       value="send" 
                       class="btn"
                       name="form_register_submit">


              <script src="./assets/javascript/register-validate-form.js" 
                      type="application/javascript">      
              </script>
            </form>
        </main>

        

        <?php get_footer(); ?>
    </body>
</html>