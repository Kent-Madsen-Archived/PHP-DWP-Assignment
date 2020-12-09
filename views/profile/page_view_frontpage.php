<div>
    <h3>
        My Profile
    </h3>

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