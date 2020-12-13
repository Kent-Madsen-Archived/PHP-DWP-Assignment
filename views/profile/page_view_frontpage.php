<div>
    <h3>
        My Profile
    </h3>

    <h4> Welcome, <?php echo $profile->getUsername(); ?> </h4>

    <ul>
        <li>
            <p>Profile Type: <?php echo "{$profile->getProfileType()}" ?></p>
        </li>

        <li>
            <p>
                Address:
                <?php echo "{$form_info->getAddressStreetName()} {$form_info->getAddressNumber()} {$form_info->getAddressStreetFloor()},";?>
                <?php echo "{$form_info->getAddressZipCode()} {$form_info->getAddressCity()} {$form_info->getAddressCountry()}"; ?>
            </p>
        </li>

        <li>
            <p>
                Name: <?php echo "{$form_info->getFirstname()}, {$form_info->getLastname()} {$form_info->getMiddlename()}"; ?>
            </p>
        </li>

        <li>
            <p>Mail: <?php echo "{$form_info->getEmail()}"; ?></p>
        </li>

        <li>
            <p>Phone: <?php echo "{$form_info->getPersonPhone()}"; ?></p>
        </li>

        <li>
            <p>Birthday: <?php echo "{$form_info->getPersonBirthday()}"; ?></p>
        </li>
    </ul>
</div>