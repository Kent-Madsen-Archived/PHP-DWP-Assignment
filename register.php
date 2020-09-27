<?php require_once 'head.php'; ?>

<?php if( isset( $_POST['register'] ) ): ?>
    <?php 
        $connection = new mysqli('localhost', 'root', '', 'dwp_assignment');

        $sql = "INSERT INTO profile (username, password, email) VALUES (?, ?, ?)";
        $stmt = $connection->prepare($sql);

        $stmt->bind_param("sss", $_stmt_username, $_stmt_password, $_stmt_email);

        $_stmt_username = $_POST['username_input'];
        
        $_stmt_password = password_hash( $_POST['password_input_1'], PASSWORD_BCRYPT, ['cost'=>15] );
        $_stmt_email = $_POST['email_input_1'];
        
        $stmt->execute();

        $last_id = $connection->insert_id;

        $stmt->close();

        $sql_pi = "INSERT INTO profile_information (profile_id, birthday, phone_number, address, firstname, middlename, lastname) VALUES (?, ?, ?, ?, ?, ?, ?)";
        
        $stmt_pi=$connection->prepare($sql_pi);

        $stmt_pi->bind_param("issssss", $stmt_profile_id, 
                                        $stmt_birthday, 
                                        $stmt_phonenumber, 
                                        $stmt_address, 
                                        $stmt_firstname, 
                                        $stmt_middlename, 
                                        $stmt_lastname );

        $stmt_profile_id = $last_id;

        $stmt_birthday = $_POST['birthday_input'];
        $stmt_phonenumber = $_POST['text_input_phone_number'];
        $stmt_address = $_POST['text_input_address'];

        $stmt_firstname = $_POST['text_input_fn'];
        $stmt_middlename = $_POST['text_input_mn'];
        $stmt_lastname = $_POST['text_input_ln'];

        $stmt_pi->execute();

        $stmt_pi->close(); 

        $connection->close();        
    ?>
<?php endif; ?> 


<?php if( !logged_in() ): ?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php require 'header.php'; ?>  
        <main>
            <form class="register-form" method="post"> 
                <span>    
                    <label> Profil </label>
                    <input class="input" type="text" name="username_input" id ="username" placeholder="username">
                </span>
                
                <span> 
                    <label> E-mail </label>
                    <input class="input" type="email" name="email_input_1" id ="email_input_1" placeholder="email">
                    <input class="input" type="email" name="email_input_2" id ="email_input_2" placeholder="re-enter email">
                </span>

                <span>
                    <label> Password </label>
                    <input class="input" type="password" name="password_input_1" id ="password_input_1" placeholder="password">
                    <input class="input" type="password" name="password_input_2" id ="password_input_2" placeholder="re-enter password">
                </span>
                
                <span>
                    <label> Personal </label>
                    <input class="input" type="text" name="text_input_fn" id ="" placeholder="First name">
                    <input class="input" type="text" name="text_input_mn" id ="" placeholder="Middle name">
                    <input class="input" type="text" name="text_input_ln" id ="" placeholder="Last name">
                    <input class="input" type="text" name="text_input_address" id ="" placeholder="Address">
                    <input class="input" type="text" name="text_input_phone_number" id ="" placeholder="Phone number">

                    <input type="date" name="birthday_input" id ="birthday_input">
                </span>

                <span> 
                    <input class="button" type="submit" value="register" name="register">
                </span>
            </form> 
        </main>
        <?php require 'footer.php'; ?>
    </body>
</html>
<?php endif; ?>