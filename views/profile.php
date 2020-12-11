<?php
    /**
     *  Title: Profile
     *  Author: Kent vejrup Madsen
     *  Type: PHP Script, view
     *  Project: DWP-Assignment
     */

    PageTitleController::getSingletonController()->append( ' - Profile' );
    $domain = new ProfileDomain();

    $profile = $domain->retrieveProfileAt( SessionUserProfile::getSessionUserProfileIdentity() );

    $type_factory = GroupAuthentication::getProfileTypeFactory();
    $type_m = $type_factory->createModel();
    $type_m->setIdentity($profile->getProfileType());
    $type_factory->readModel($type_m);

    $profinfo_factory = GroupAuthentication::getProfileInformationFactory();
    $form_info = $profinfo_factory->readModelForm(SessionUserProfile::getSessionUserProfileIdentity());




$router = RouterSingleton::getInstance()->getCurrentRoute();
    $operation_value = $router->getValidationTree()[1]->getValue();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php echo encodingStandardHTML(); ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        
        <?php
            PageTitleView::getSingletonView()->printHTML();
        ?>
    </head>
    <body>
        <?php getHeader(); ?>
        
        <main>
            <div>
                <a class="btn" href="/profile">
                    My Profile
                </a>
                
                <a class="button" href="/profile/update_address">
                    Update Address
                </a>

                <a class="button" href="/profile/update_contact">
                    Update Contact Information
                </a>

                <a class="button" href="/profile/update_personal_information">
                    Update Personal Information
                </a>
            </div>

            <?php if(!isset($operation_value)): ?>
                <?php require 'views/profile/page_view_frontpage.php';?>

            <?php elseif($operation_value == 'update_address'): ?>
                <?php require 'views/profile/page_view_update_address.php';?>

            <?php elseif($operation_value == 'update_contact'): ?>
                <?php require 'views/profile/page_view_update_contact.php';?>

            <?php elseif($operation_value == 'update_personal_information'): ?>
                <?php require 'views/profile/page_view_update_personal_information.php';?>
            <?php endif;?>
        </main>

        <?php getFooter(); ?>
    </body>
</html>