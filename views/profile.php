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
    $profinfo = $domain->retrieveProfileInformationAt( $profile->getIdentity() );

    $expPro = $domain->expandModelProfile($profile);
    $expansion = $domain->expandProfileInformation($profinfo);

    $profileType = $domain->retrieveProfileTypeAt(SessionUserProfile::getSessionUserProfileType());

    $person_addr = $expansion['person_address_model'];
    $person_name = $expansion['person_name_model'];
    $person_mail = $expansion['person_mail_model'];

    $mail_view = new PersonEmailView( $person_mail );


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
    <?php

    ?>
        <?php getHeader(); ?>
        
        <main>
            <div> 
                <h2>
                    My Profile
                </h2>

                <h4> Welcome, <?php echo $profile->getUsername(); ?> </h4>

                <ul>
                    <li>
                        <p>Profile Type: <?php echo $profileType->getContent(); ?></p>
                    </li>

                    <li>
                        <p>
                            Address:
                            <?php $viewAddress = new PersonAddressView($person_addr); ?>
                            <?php echo  $viewAddress->printDenmarkFormatForHomeAddress(); ?>

                        </p>
                    </li>

                    <li>
                        <p>
                            Name: <?php echo "{$person_name->getFirstName()}, {$person_name->getLastName()} {$person_name->getMiddleName()}"; ?>
                        </p>
                    </li>

                    <li>
                        <p>Mail: <?php echo $mail_view->printInteractiveEmail(); ?></p>
                    </li>

                    <li>
                        <p>Phone: <?php echo "{$profinfo->getPersonPhone()}"; ?></p>
                    </li>


                    <li>
                        <p>Birthday: <?php echo "{$profinfo->getBirthday()}"; ?></p>
                    </li>


                </ul>

            </div>
        </main>

        <?php getFooter(); ?>
    </body>
</html>